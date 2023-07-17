<?php

namespace App\Http\Controllers\api;

use App\Exceptions\ExceptionHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLoginRequest;
use App\Mail\ForgotPassword;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Socialite\Facades\Socialite;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'phone' => 'required|unique:users',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->messages()->first(), 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'code' => $request->code,
                'coins' => 5,
                'profile_image' => $request->profile_image,
            ]);

            DB::commit();

            return [
                'access_token' => $user->createToken('auth_token')->plainTextToken,
                'success' => true,
            ];
        } catch (Exception $e) {

            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function login(Request $request)
    {
        try {

            $user = $this->verifyLogin($request);
            if (!Hash::check($request->password, $user->password)) {
                throw new Exception('credentials do not match with our records!', 400);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return [
                'access_token' => $token,
                'success' => true,
            ];
        } catch (Exception $e) {

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
    public function verifyLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages()->first(), 422);
        }

        $user = User::where([['email', $request->email], ['status', true]])->first();

        if (!$user) {
            throw new Exception('this user not exists or deactivate', 400);
        }

        return $user;
    }

    public function self()
    {
        $user = User::find(auth('sanctum')->user()->id);

        return [
            'user' => $user,
            'success' => true,
        ];
    }

    public function forgotPassword(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'email|exists:users',
                'phone' => 'exists:users',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->messages()->first(), 422);
            }

            $otp = $this->generateOtp($request);
            if (isset($request->phone) && isset($request->code)) {
                $this->sendSMS($otp, $request);
            }

            if (isset($request->email)) {
                Mail::to($request->email)->send(new ForgotPassword($otp));
            }

            return [
                'message' => 'We have verification code in registered detailed!',
                'success' => true,
            ];
        } catch (Exception $e) {

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function verifyToken(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'otp' => 'required',
                'email' => 'email|max:255',
                'phone' => 'exists:users',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->messages()->first(), 422);
            }

            $user = DB::table('password_resets')
                ->where('otp', $request->otp)
                ->where(function ($query) use ($request) {
                    $query->where('email', $request->email)
                        ->orWhere('phone', $request->phone);
                })
                ->where('created_at', '>', Carbon::now()->subHours(1))
                ->first();

            if (!$user) {
                throw new Exception('Either your email or number or otp is wrong.', 400);
            }

            return [
                'message' => 'Verification Code is Verified',
                'success' => true,
            ];
        } catch (Exception $e) {

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function getProvider($request)
    {
        return Socialite::driver($request->login_with)->userFromToken($request->access_provider_token);
    }

    public function providerCreateOrGet($provider)
    {
        return User::firstOrCreate(['email' => $provider->getEmail()], [
            'email' => $provider->getEmail(),
            'name' => $provider->getName(),
            'coins' => 5,
            'status' => true,
            'profile_image_url' => $provider->getAvatar(),
        ]);
    }

    public function updatePassword(Request $request)
    {
        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [
                'otp' => 'required',
                'email' => 'email|max:255|exists:users',
                'phone' => 'exists:users',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->messages()->first(), 422);
            }

            $user = DB::table('password_resets')
                ->where('otp', $request->otp)
                ->where(function ($query) use ($request) {
                    $query->where('email', $request->email)
                        ->orWhere('phone', $request->phone);
                })
                ->where('created_at', '>', Carbon::now()->subHours(1))
                ->first();

            if (!$user) {
                throw new Exception('Either your email or phone or token is wrong.', 400);
            }

            User::where(function ($query) use ($request) {
                $query->where('email', $request->email)
                    ->orWhere('phone', $request->phone);
            })->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where('otp', $request->otp)
                ->where(function ($query) use ($request) {
                    $query->where('email', $request->email)
                        ->orWhere('phone', $request->phone);
                })
                ->where('created_at', '>', Carbon::now()->subHours(1))
                ->delete();

            DB::commit();

            return [
                'message' => 'Your password has been changed!',
                'success' => true,
            ];
        } catch (Exception $e) {

            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function socialLogin(SocialLoginRequest $request)
    {
        DB::beginTransaction();
        try {

            $provider = $this->getProvider($request);
            $user = $this->providerCreateOrGet($provider);

            DB::commit();
            if ($user->status) {
                return response()->json([
                    'success' => true,
                    'token' => $user->createToken('Sanctom+Socialite')->plainTextToken,
                    'user' => $user,
                ], 200);
            }

            throw new Exception('This user is deactivate', 403);
        } catch (Exception $e) {

            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function generateOtp($request)
    {
        $otp = rand(111111, 999999);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'otp' => $otp,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);

        return $otp;
    }

    public function sendSMS($otp, $request)
    {
        $client = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $to = $to = '+' . $request->code . $request->phone;
        $client->messages->create($to, [
            'from' => env('TWILIO_FROM'),
            'body' => 'Your OTP for login is ' . $otp,
        ]);
    }

    public function phoneLogin(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'phone' => 'required',
                'code' => 'required',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->messages()->first(), 422);
            }

            $otp = $this->generateOtp($request);
            $this->sendSMS($otp, $request);

            return [
                'message' => 'OTP sent successfully',
                'success' => true,
            ];
        } catch (Exception $e) {

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function verifyOtp(Request $request)
    {
        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [
                'otp' => 'required',
                'phone' => 'required',
                'code' => 'required',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->messages()->first(), 422);
            }

            $verify = DB::table('password_resets')
                ->where('otp', $request->otp)
                ->where('phone', $request->phone)
                ->where('created_at', '>', Carbon::now()->subHours(1))
                ->first();

            if (!$verify) {
                throw new Exception('Invalid OTP or Phone Number', 400);
            }

            $user = User::firstOrCreate(['phone' => $verify->phone], [
                'phone' => $verify->phone,
                'code' => $request->code,
                'coins' => 5,
                'status' => true,
            ]);

            if (!$user) {
                throw new Exception('this user not exists or deactivate', 404);
            }

            DB::table('password_resets')->where(['phone' => $request->phone])->delete();
            DB::commit();

            if (!$user->status) {
                throw new Exception('this user is deactivate', 404);
            }

            return [
                'access_token' => $user->createToken('auth_token')->plainTextToken,
                'user' => $user,
                'success' => true,
            ];
        } catch (Exception $e) {

            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function logout(Request $request)
    {
        try {

            $token = PersonalAccessToken::findToken($request->bearerToken());
            if (!$token) {
                throw new Exception('Selected Access token is Invalid', 400);
            }

            $token->delete();

            return [
                'message' => 'User Logout',
                'success' => true,
            ];
        } catch (Exception $e) {

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
}

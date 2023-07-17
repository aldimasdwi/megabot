<?php

namespace App\Repositories\Eloquents;

use App\Exceptions\ExceptionHandler;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Eloquent\BaseRepository;

class AccountRepository extends BaseRepository
{
    protected $fields = [
        'name',
        'email',
        'phone',
        'code',
        'profile_image_url',
    ];

    public function model()
    {
        return User::class;
    }

    public function updateProfile($request)
    {
        DB::beginTransaction();
        try {
            $request['phone'] = (string) $request['phone'];
            $user = $this->model->findOrFail(auth()->user()->id);

            if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
                $user->clearMediaCollection('profile_image');
                $media = $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
                $request['profile_image_url'] = $media->getFullUrl();
            }
            $user->update($request->all());

            DB::commit();

            return [
                'user' => $user,
                'success' => true,
            ];
        } catch (Exception $e) {

            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function updatePassword($request)
    {
        DB::beginTransaction();
        try {

            $user = $this->model->findOrFail(auth('sanctum')->user()->id);
            $user->update(['password' => Hash::make($request->password)]);

            DB::commit();

            return $user;
        } catch (Exception $e) {

            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function deleteAccount()
    {
        DB::beginTransaction();
        try {

            $user = $this->model->findOrFail(auth('sanctum')->user()->id);
            $user->forceDelete(auth('sanctum')->user()->id);
            DB::commit();

            return [
                'message' => 'User deleted successfully',
                'success' => true,
            ];
        } catch (Exception $e) {
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
}

<?php

namespace App\Repositories\Admin;

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

            return redirect()->back()->with('message', __('static.response.profile_updated'));
        } catch (Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updatePassword($request)
    {
        DB::beginTransaction();
        try {
            $user = $this->model->findOrFail(auth()->user()->id);
            $user->update(['password' => Hash::make($request->new_password)]);

            DB::commit();

            return redirect()->back()->with('message', __('static.response.password_updated'));
        } catch (Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

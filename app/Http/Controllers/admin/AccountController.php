<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\Admin\AccountRepository;

class AccountController extends Controller
{
    protected $repository;
    public function __construct(AccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        return $this->repository->updatePassword($request);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        return $this->repository->updateProfile($request);
    }

    /**
     * Show Admin Profile
     */
    public function profile()
    {
        return view('admin.account.profile');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\SettingsRepository;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $repository;

    public function __construct(SettingsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function generalSetting(Request $request)
    {
        return $this->repository->generalSetting($request);
    }

    public function adsSetting(Request $request)
    {
        return $this->repository->adsSetting($request);
    }

    public function emailSetting(Request $request)
    {
        return $this->repository->emailSetting($request);
    }

    public function appUpdatePopup(Request $request)
    {
        return $this->repository->appUpdatePopup($request);
    }
}

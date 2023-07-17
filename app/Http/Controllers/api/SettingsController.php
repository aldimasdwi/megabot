<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\SettingsRepository;

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

    public function frontSettings()
    {
        return $this->repository->frontSettings();
    }
}

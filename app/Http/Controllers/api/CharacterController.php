<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index()
    {
        return Character::all();
    }
}

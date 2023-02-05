<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Tuyển dụng & Tìm việc làm';
        $user = auth()->user();
        // $role = strtolower(UserRoleEnum::getKeys($user->role)[0]);
        return view('layouts.master', compact('title'));
    }
}

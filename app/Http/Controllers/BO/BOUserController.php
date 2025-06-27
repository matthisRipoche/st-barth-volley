<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BOUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('back-office.pages.user.index', [
            'users' => $users
        ]);
    }
}

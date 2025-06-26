<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BOUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('back-office.pages.user.index', compact('users'));
    }
}

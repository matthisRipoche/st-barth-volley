<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BOArticleController extends Controller
{
    public function index()
    {
        return view('back-office.pages.articles');
    }
}

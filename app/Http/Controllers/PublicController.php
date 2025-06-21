<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('public-site.pages.home');
    }

    public function actu()
    {
        return view('public-site.pages.actu');
    }

    public function bureau()
    {
        return view('public-site.pages.bureau');
    }

    public function equipes()
    {
        return view('public-site.pages.equipes');
    }

    public function contact()
    {
        return view('public-site.pages.contact');
    }
}

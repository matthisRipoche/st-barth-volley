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
        return view('public-site.pages.actu', [
            'title' => 'Actualités du club'
        ]);
    }

    public function bureau()
    {
        return view('public-site.pages.bureau', [
            'title' => 'Bureau'
        ]);
    }

    public function equipes()
    {
        return view('public-site.pages.equipes', [
            'title' => 'Equipes'
        ]);
    }

    public function contact()
    {
        return view('public-site.pages.contact', [
            'title' => 'Contact'
        ]);
    }

    public function mentionsLegales()
    {
        return view('public-site.pages.mentions-legales', [
            'title' => 'Mentions légales'
        ]);
    }

    public function planSite()
    {
        return view('public-site.pages.plan-site', [
            'title' => 'Plan du site'
        ]);
    }

    public function cookies()
    {
        return view('public-site.pages.cookies', [
            'title' => 'Cookies'
        ]);
    }
}

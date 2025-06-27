<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class FrontController extends Controller
{
    public function home()
    {
        return view('front.pages.home');
    }

    public function actu()
    {
        $articles = Article::all();
        return view('front.pages.actu', [
            'articles' => $articles
        ]);
    }

    public function bureau()
    {
        return view('front.pages.bureau');
    }

    public function equipes()
    {
        return view('front.pages.equipes');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }
}

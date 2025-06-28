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
        $articles = $articles->sortByDesc('updated_at');

        return view('front.pages.actu', [
            'articles' => $articles
        ]);
    }

    public function singleArticle(Article $article)
    {
        return view('front.pages.single-article', [
            'article' => $article
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

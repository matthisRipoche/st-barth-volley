<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Models\Article;

class BOArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('back-office.pages.article.index', [
            'articles' => $articles
        ]);
    }
}

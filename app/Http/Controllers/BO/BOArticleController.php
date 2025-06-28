<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Models\Article;

class BOArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $articles = $articles->sortByDesc('updated_at');

        return view('back-office.pages.article.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('back-office.pages.article.create');
    }

    public function store()
    {
        Article::create(Request::all());

        return redirect()->route('back-office.articles.index');
    }

    public function show($article)
    {
        return view('back-office.pages.article.show', [
            'article' => Article::find($article)
        ]);
    }

    public function update($article)
    {
        $article = Article::find($article);

        $article->update(Request::all());

        return redirect()->route('back-office.articles.show', $article);
    }

    public function delete($article)
    {
        $article = Article::find($article);

        $article->delete();

        return redirect()->route('back-office.articles.index');
    }
}

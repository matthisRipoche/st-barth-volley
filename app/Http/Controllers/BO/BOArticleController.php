<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
        $media = Media::all();
        return view('back-office.pages.article.create', [
            'media' => $media
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content' => 'required|string',
            'media_id' => 'nullable|exists:media,id',
        ]);

        // Slug auto si vide
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        Article::create($validated);

        return redirect()->route('back-office.articles.index')->with('success', 'Article créé avec succès ✅');
    }

    public function show($article)
    {
        $media = Media::all();
        return view('back-office.pages.article.show', [
            'article' => Article::find($article),
            'media' => $media
        ]);
    }

    public function update(Request $request, $article)
    {
        $article = Article::find($article);

        $article->update($request->all());

        return redirect()->route('back-office.articles.show', $article);
    }

    public function delete($article)
    {
        $article = Article::find($article);

        $article->delete();

        return redirect()->route('back-office.articles.index');
    }
}

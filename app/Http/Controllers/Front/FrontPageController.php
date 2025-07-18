<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;

class FrontPageController extends Controller
{
    public function frontpage()
    {
        $page = Page::with(['blockCollections.block'])
            ->where('is_home', true)
            ->firstOrFail();
        return view('front.pages.standardPage', [
            'page' => $page
        ]);
    }

    public function page(Page $page)
    {
        $articles = Article::all();

        if (! $page->is_active) {
            abort(404);
        }

        if ($page->is_news) {
            return view('front.pages.news', [
                'page' => $page,
                'articles' => $articles
            ]);
        }

        return view('front.pages.standardPage', [
            'page' => $page
        ]);
    }
}

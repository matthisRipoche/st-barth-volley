<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class BOPageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $pages = $pages->sortByDesc('updated_at');

        return view('back-office.pages.page.index', [
            'pages' => $pages
        ]);
    }

    public function create()
    {
        return view('back-office.pages.page.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
        ]);

        // Ajout des champs booléens convertis
        $validated['is_active'] = $request->has('is_active');
        $validated['is_home'] = $request->has('is_home');
        $validated['is_news'] = $request->has('is_news');

        Page::create($validated);

        return redirect()->route('back-office.pages.index')->with('success', 'Page créée avec succès.');
    }
}

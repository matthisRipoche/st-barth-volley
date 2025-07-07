<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Block;

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

    public function show($page)
    {
        $page = Page::find($page);
        $blocks = Block::TYPES;

        if (!$page) {
            return redirect()->route('back-office.pages.index')->with('error', 'Page non trouvée.');
        }

        return view('back-office.pages.page.show', [
            'page' => $page,
            'blocks' => $blocks
        ]);
    }

    public function update(Request $request, $pageSlug)
    {
        $page = Page::where('slug', $pageSlug)->first();

        if (!$page) {
            return redirect()->route('back-office.pages.index')->with('error', 'Page non trouvée.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'is_active' => 'sometimes|boolean',
            'is_home' => 'sometimes|boolean',
            'is_news' => 'sometimes|boolean',
        ]);

        // Valeur par défaut si case décochée
        $validated['is_active'] = $request->has('is_active');
        $validated['is_home'] = $request->has('is_home');
        $validated['is_news'] = $request->has('is_news');

        // Ne pas avoir is_home et is_news à true
        if ($validated['is_home'] && $validated['is_news']) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['is_home' => 'Une page ne peut pas être à la fois page d\'accueil et page des actualités.']);
        }

        $page->update($validated);

        return redirect()->route('back-office.pages.index')->with('success', 'Page modifiée avec succès.');
    }

    public function delete($page)
    {
        $page = Page::find($page);

        if (!$page) {
            return redirect()->route('back-office.pages.index')->with('error', 'Page non trouvée.');
        }

        $page->delete();

        return redirect()->route('back-office.pages.index');
    }

    /**
     * Ajoute un bloc à une page
     *
     * @param Request $request
     * @param string $pageSlug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addBlock(Request $request, $pageSlug)
    {
        $page = Page::where('slug', $pageSlug)->firstOrFail();

        $request->validate([
            'block.type' => 'required|string|max:255',
        ]);

        $type = $request->input('block.type');

        $block = Block::create([
            'type' => $type,
            'name' => ucfirst($type),
            'content' => [],
        ]);

        $page->blockCollections()->create([
            'block_id' => $block->id,
            'type' => $type,
            'position' => $page->blockCollections()->count() + 1,
        ]);

        return redirect()->route('back-office.pages.show', $page->id)
            ->with('success', 'Bloc ajouté avec succès.');
    }

    public function deleteBlock($pageSlug, $blockId)
    {
        $page = Page::where('slug', $pageSlug)->firstOrFail();
        $block = $page->blockCollections()->where('block_id', $blockId)->firstOrFail();

        $block->delete();

        Block::findOrFail($blockId)->delete();

        return redirect()->route('back-office.pages.show', $page->id)
            ->with('success', 'Bloc supprimé avec succès.');
    }

    public function updateBlock(Request $request, $pageId, $blockId)
    {
        $page = Page::findOrFail($pageId);
        $block = Block::findOrFail($blockId);

        // Optionnel : vérifier que le bloc est bien relié à la page
        if (!$page->blockCollections()->where('block_id', $block->id)->exists()) {
            abort(403, 'Ce bloc n\'appartient pas à cette page.');
        }

        $content = $request->input('content', []);

        // Tu peux adapter la validation par type de bloc si tu veux
        $block->update([
            'content' => $content,
        ]);

        return redirect()->route('back-office.pages.show', $page->id)
            ->with('success', 'Bloc mis à jour.');
    }
}

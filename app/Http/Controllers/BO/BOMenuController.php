<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Page;
use App\Models\MenuItem;

class BOMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('back-office.pages.menu.index', [
            'menus' => $menus
        ]);
    }

    public function create()
    {
        return view('back-office.pages.menu.create');
    }

    public function store(Request $request)
    {
        $menu = Menu::create($request->all());

        return redirect()->route('back-office.menus.index');
    }

    public function show($id)
    {
        $menu = Menu::with('items.page')->findOrFail($id);
        $pages = Page::where('is_active', true)->get();

        return view('back-office.pages.menu.show', [
            'menu' => $menu,
            'pages' => $pages
        ]);
    }


    public function update(Request $request, $menuID)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $menu = Menu::findOrFail($menuID);


        $menu->update([
            'title' => $request->title,
            'slug' => $request->slug,
        ]);

        return redirect()->route('back-office.menus.show', $menu->id);
    }

    public function addItem(Request $request, Menu $menu)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
            'url' => 'nullable|url',
        ]);

        $item = $menu->items()->create([
            'label' => $request->label,
            'page_id' => $request->page_id,
            'url' => $request->page_id ? null : $request->url,
            'order' => $menu->items()->max('order') + 1,
        ]);

        return redirect()->route('back-office.menus.show', $menu->id);
    }

    public function destroyItem($id)
    {
        $item = MenuItem::findOrFail($id);
        $item->delete();

        return redirect()->route('back-office.menus.show', $item->menu_id);
    }


    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('back-office.menus.index');
    }
}

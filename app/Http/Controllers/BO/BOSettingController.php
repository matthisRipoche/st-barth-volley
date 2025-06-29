<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Setting;

class BOSettingController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('back-office.pages.setting.index', [
            'menus' => $menus,
            'header_menu_id' => Setting::get('header_menu_id'),
            'footer_menu_id' => Setting::get('footer_menu_id'),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'header_menu_id' => 'nullable|exists:menus,id',
            'footer_menu_id' => 'nullable|exists:menus,id',
        ]);

        Setting::set('header_menu_id', $request->header_menu_id);
        Setting::set('footer_menu_id', $request->footer_menu_id);

        return redirect()->route('back-office.setting.index')->with('success', 'Paramètres mis à jour avec succès.');
    }
}

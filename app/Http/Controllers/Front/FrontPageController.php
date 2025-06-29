<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class FrontPageController extends Controller
{
    public function page(Page $page)
    {
        if (! $page->is_active) {
            abort(404);
        }

        return view('front.pages.standardPage', [
            'page' => $page
        ]);
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class FrontPageController extends Controller
{
    public function page(Page $page)
    {
        return view('front.pages.standardPage', [
            'page' => $page
        ]);
    }
}

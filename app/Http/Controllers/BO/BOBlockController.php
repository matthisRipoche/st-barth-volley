<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;

class BOBlockController extends Controller
{
    public function index()
    {
        $blocks = Block::all();
        return view('back-office.pages.block.index', [
            'blocks' => $blocks
        ]);
    }

    public function create()
    {
        return view('back-office.pages.block.create');
    }

    public function store(Request $request)
    {
        Block::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('back-office.blocks.index');
    }

    public function show(Block $block)
    {
        return view('back-office.pages.block.show', [
            'block' => $block
        ]);
    }

    public function update(Request $request, Block $block)
    {
        $block->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('back-office.blocks.index');
    }

    public function delete(Block $block)
    {
        $block->delete();

        return redirect()->route('back-office.blocks.index');
    }
}

<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BOMediaController extends Controller
{

    public function index()
    {
        $media = Media::all();

        return view('back-office.pages.media.index', [
            'media' => $media,
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:20480', // 20 MB
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        Media::create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
        ]);

        return redirect()->route('back-office.media.index')->with('success', 'Fichier ajouté avec succès ✅');
    }

    public function sync()
    {
        $files = Storage::disk('public')->files('uploads');

        $imported = 0;

        foreach ($files as $file) {
            // Vérifie si le fichier est déjà en BDD
            if (!Media::where('path', $file)->exists()) {
                Media::create([
                    'name' => basename($file),
                    'path' => $file,
                    'mime_type' => Storage::disk('public')->mimeType($file),
                    'extension' => pathinfo($file, PATHINFO_EXTENSION),
                    'size' => Storage::disk('public')->size($file),
                ]);

                $imported++;
            }
        }

        return redirect()->route('back-office.media.index')->with('success', "$imported média(s) synchronisé(s) ✅");
    }
}

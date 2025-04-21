<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BeritaController extends Controller
{

    public function index()
    {
        $beritas = Berita::latest()->get();

        return view('admin.berita.berita', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        $image = $request->file('image');
        $filename = $image->hashName();
        $path = 'public/beritas/' . $filename;

        $img = Image::make($image->getRealPath())
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode(null, 80);

        Storage::put($path, (string) $img);

        Berita::create([
            'image' => $filename,
            'judul' => $request->judul,
            'konten' => $request->konten,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita created successfully.');
    }
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        Storage::delete('public/beritas/' . $berita->image);
        $berita->delete();

        return redirect()->route('admin.berita')->with('success', 'Berita deleted successfully.');
    }
}

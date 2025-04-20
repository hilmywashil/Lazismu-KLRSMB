<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HeroController extends Controller
{

    public function index()
    {
        $heroes = Hero::latest()->get();

        return view('admin.banner.hero', compact('heroes'));
    }

    public function create()
    {
        return view('admin.banner.create-hero');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png,svg,webp|max:2048',
        ]);

        $image = $request->file('image');

        $filename = $image->hashName();
        $path = 'public/heroes/' . $filename;

        $img = Image::make($image->getRealPath())
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode(null, 80);

        Storage::put($path, (string) $img);

        // Simpan data ke database
        Hero::create([
            'image' => $filename,
        ]);

        return redirect()->back()->with(['success' => 'Gambar berhasil diupload!']);
    }

    public function destroy($id): RedirectResponse
    {
        $hero = Hero::findOrFail($id);
        $hero->delete();

        return redirect()->back()->with(['success' => 'Berhasil Menghapus!']);
    }

}

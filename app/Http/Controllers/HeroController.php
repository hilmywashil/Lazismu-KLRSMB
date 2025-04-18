<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $image->storeAs('public/heroes', $image->hashName());

        Hero::create([
            'image' => $image->hashName(),
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

<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.galeri.galeri', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galeri.create-galeri');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png,svg,webp',
            'judul' => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/galeries', $image->hashName());

        Gallery::create([
            'image' => $image->hashName(),
            'judul' => $request->judul
        ]);

        return redirect()->back()->with(['success' => 'Berhasil Ditambahkan!']);
    }

    public function destroy($id): RedirectResponse
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->back()->with(['success' => 'Berhasil Menghapus!']);
    }

}

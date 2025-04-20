<?php

namespace App\Http\Controllers;

use App\Models\LatarBelakang;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function index()
    {
        return view('admin.pages.latarindex');
    }
    public function createLatarBelakang()
    {
        return view('admin.pages.latar-belakang.create');
    }

    public function storeLatarBelakang(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png,svg,webp',
            'isi' => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/latarbelakang', $image->hashName());

        LatarBelakang::create([
            'image' => $image->hashName(),
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.latarbelakang')->with(['success' => 'Berhasil Menyimpan Latar Belakang!']);
    }


    public function latarBelakang()
    {
        $latarbelakang = LatarBelakang::all();
        return view('pages.latarbelakang', compact('latarbelakang'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}

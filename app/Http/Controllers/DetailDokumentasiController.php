<?php

namespace App\Http\Controllers;

use App\Models\DetailDokumentasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DetailDokumentasiController extends Controller
{
    public function index($id)
    {
        $detail = DetailDokumentasi::where('dokumentasi_id', $id)->latest()->first();

        return view('dokumentasis.detail.index', compact('detail'));
    }

    // public function create()
    // {
    //     return view('dokumentasi.detail.addImage');
    // }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|image',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/dokumentasi', $image->hashName());

        $dokumentasiId = $request->input('dokumentasi_id');

        DetailDokumentasi::create([
            'image' => $image->hashName(),
            'dokumentasi_id' => $dokumentasiId
        ]);

        return redirect('/')->with('success', 'Sukses upload gambar');
    }
}

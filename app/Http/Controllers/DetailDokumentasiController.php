<?php

namespace App\Http\Controllers;

use App\Models\DetailDokumentasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DetailDokumentasiController extends Controller
{
    public function index($id)
    {
        $details = DetailDokumentasi::where('dokumentasi_id', $id)->latest()->get();
        return view('dokumentasis.detail.index', compact('details', 'id'));
    }
    public function adminShow($id)
    {
        $details = DetailDokumentasi::where('dokumentasi_id', $id)->latest()->get();

        return view('admin.program.detail-program', compact('details', 'id'));
    }

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

        return redirect()->back()->with('success', 'Sukses upload gambar');
    }
}

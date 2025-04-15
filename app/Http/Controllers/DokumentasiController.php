<?php

namespace App\Http\Controllers;

use App\Models\DetailDokumentasi;
use App\Models\Dokumentasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasis = Dokumentasi::latest()->paginate();

        return view('dokumentasis.index', compact('dokumentasis'));
    }

    public function create()
    {
        return view('dokumentasis.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $dokumentasi = Dokumentasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        DetailDokumentasi::create([
            'dokumentasi_id' => $dokumentasi->id
        ]);

        return redirect()->to('/')->with(['success' => 'Berhasil Menambahkan Dokumentasi!']);
    }

}

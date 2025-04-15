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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $dokumentasi = Dokumentasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/dokumentasi', $image->hashName());
            $filename = $image->hashName();
        }

        DetailDokumentasi::create([
            'dokumentasi_id' => $dokumentasi->id,
            'image' => $filename,
        ]);

        return redirect()->to('/')->with(['success' => 'Berhasil Menambahkan Dokumentasi!']);
    }

    public function edit($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);

        return view('dokumentasis.edit', compact('dokumentasi'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $dokumentasi = Dokumentasi::findOrFail($id);

        $dokumentasi->update([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
        ]);

        return redirect()->to('/')->with('success', 'Berhasil Mengupdate Dokumentasi!');
    }
    public function destroy($id): RedirectResponse
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        $dokumentasi->delete();

        return redirect()->to('/')->with(['success' => 'Berhasil Menghapus Dokumentasi!']);
    }
}

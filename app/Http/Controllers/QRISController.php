<?php

namespace App\Http\Controllers;

use App\Models\QRIS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QRISController extends Controller
{

    public function kelolaQris()
    {
        return view('admin.kelola-qris');
    }

    public function index()
    {
        $qrises = QRIS::all();

        return view('admin.qrisinfaq.index', compact('qrises'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png,svg,webp',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/qris', $image->hashName());

        QRIS::create([
            'image' => $image->hashName(),
        ]);

        return redirect()->route('admin.qris.infaq')->with(['success' => 'Berhasil Menyimpan QRIS!']);
    }

    public function destroy(string $id)
    {
        $qris = QRIS::findOrFail($id);
        Storage::delete('public/qris/' . $qris->image);
        $qris->delete();

        return redirect()->route('admin.qris.infaq')->with(['success' => 'Berhasil Menghapus QRIS!']);
    }
}

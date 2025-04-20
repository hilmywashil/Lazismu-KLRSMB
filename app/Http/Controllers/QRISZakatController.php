<?php

namespace App\Http\Controllers;

use App\Models\QRISZakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QRISZakatController extends Controller
{
    public function index()
    {
        $qriszakats = QRISZakat::all();

        return view('admin.qriszakat.index', compact('qriszakats'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png,svg,webp',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/qris', $image->hashName());

        QRISZakat::create([
            'image' => $image->hashName(),
        ]);

        return redirect()->route('admin.qris.zakat')->with(['success' => 'Berhasil Menyimpan QRIS!']);
    }

    public function destroy(string $id)
    {
        $qriszakat = QRISZakat::findOrFail($id);
        Storage::delete('public/qris/' . $qriszakat->image);
        $qriszakat->delete();

        return redirect()->route('admin.qris.zakat')->with(['success' => 'Berhasil Menghapus QRIS!']);
    }
}

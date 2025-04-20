<?php

namespace App\Http\Controllers;

use App\Models\LatarBelakang;
use Illuminate\Http\Request;

class LatarBelakangController extends Controller
{
    public function index()
    {
        $latarbelakang = LatarBelakang::all();
        return view('admin.pages.latar-belakang.index', compact('latarbelakang'));
    }
    public function create()
    {
        return view('admin.pages.latar-belakang.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'isi' => 'required',
        ]);

        LatarBelakang::create([
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.latar-belakang')->with(['success' => 'Berhasil Menyimpan Latar Belakang!']);
    }

    public function edit($id)
    {
        $latarbelakang = LatarBelakang::findOrFail($id);
        return view('admin.pages.latar-belakang.edit', compact('latarbelakang'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'isi' => 'required',
        ]);

        $latarbelakang = LatarBelakang::findOrFail($id);
        $latarbelakang->update([
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.latar-belakang')->with(['success' => 'Berhasil Mengupdate Latar Belakang!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KirimZakat;
use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ZakatController extends Controller
{
    public function index(): View
    {
        $zakats = Zakat::latest()->paginate();

        return view('admin.zakat.zakat', compact('zakats'));
    }

    public function userPage(): View
    {
        $zakats = Zakat::latest()->paginate();

        return view('zakat.zakat', compact('zakats'));
    }

    public function create(): View
    {
        return view('admin.zakat.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png,svg,webp',
            'title' => 'required',
            'target' => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/zakats', $image->hashName());

        Zakat::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'target' => $request->target
        ]);

        return redirect()->route('admin.zakat.index')->with(['success' => 'Berhasil Donasi!']);
    }

    // public function show(string $id): View
    // {
    //     $zakat = Zakat::findOrFail($id);

    //     return view('zakat.show', compact('zakat'));
    // }

    public function edit(string $id): View
    {
        $zakat = Zakat::findOrFail($id);

        return view('zakat.edit', compact('zakat'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png,svg,webp',
            'title' => 'required',
            'target' => 'required'
        ]);

        $zakat = Zakat::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/zakats', $image->hashName());

            Storage::delete('public/zakats/' . $zakat->image);

            $zakat->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'target' => $request->target
            ]);

        } else {

            $zakat->update([
                'title' => $request->title,
                'target' => $request->target
            ]);
        }

        return redirect()->route('zakat.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $zakat = Zakat::findOrFail($id);

        Storage::delete('public/zakats/' . $zakat->image);

        $zakat->delete();

        return redirect()->route('zakat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function halamanKirimZakat($zakatId): View
    {
        $zakat = Zakat::findOrFail($zakatId);

        return view('zakat.kirim-zakat', [
            'zakat_id' => $zakat->id,
            'zakat' => $zakat,
        ]);
    }

    public function kirimZakat(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'jumlah' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'zakat_id' => 'required|exists:zakats,id'
        ]);

        KirimZakat::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jumlah' => $request->jumlah,
            'metode_pembayaran' => $request->metode_pembayaran,
            'zakat_id' => $request->zakat_id
        ]);

        if ($request->metode_pembayaran === 'transfer') {
            return redirect()->route('zakat.payment.bank', ['zakat_id' => $request->zakat_id]);
        } elseif ($request->metode_pembayaran === 'e-wallet') {
            return redirect()->route('zakat.payment.qris', ['zakat_id' => $request->zakat_id]);
        }

        return redirect()->route('zakat.index')->with(['success' => 'Berhasil Berinfaq!']);
    }

    public function dataZakat()
    {
        $dataZakats = KirimZakat::with('zakat')->paginate();

        return view('admin.data.data-zakat', compact('dataZakats'));
    }

    public function destroyAllKirimZakat(): RedirectResponse
    {
        KirimZakat::truncate();

        return redirect()->route('admin.zakat.data')->with(['success' => 'Semua data Zakat berhasil dihapus!']);
    }
}
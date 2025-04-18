<?php

namespace App\Http\Controllers;

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

        return view('zakat.index', compact('zakats'));
    }

    public function create(): View
    {
        return view('zakat.create');
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

        return redirect()->route('zakat.index')->with(['success' => 'Berhasil Donasi!']);
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

}
<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public function index(): View
    {
        $types = Type::latest()->paginate(5);

        return view('types.index', compact('types'));
    }

    public function create(): View
    {
        return view('types.create');
    }
 
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png,svg,webp',
            'title' => 'required',
            'target' => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/types', $image->hashName());

        Type::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'target' => $request->target
        ]);

        return redirect()->to('/donasi-disini')->with(['success' => 'Berhasil Donasi!']);
    }

    public function show(string $id): View
    {
        $type = Type::findOrFail($id);

        return view('types.show', compact('type'));
    }

    public function edit(string $id): View
    {
        $type = Type::findOrFail($id);

        return view('types.edit', compact('type'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png,svg,webp',
            'title' => 'required',
            'target' => 'required'
        ]);

        $type = Type::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/types', $image->hashName());

            Storage::delete('public/types/' . $type->image);

            $type->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'target' => $request->target
            ]);

        } else {

            $type->update([
                'title' => $request->title,
                'target' => $request->target
            ]);
        }

        return redirect()->route('donasi-disini.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $type = Type::findOrFail($id);

        Storage::delete('public/types/' . $type->image);

        $type->delete();

        return redirect()->to('/donasi-disini')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Infaq;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class InfaqController extends Controller
{
    public function index(): View
    {
        $infaqs = Infaq::latest()->paginate(5);

        return view('infaqs.index', compact('infaqs'));
    }

    public function create(): View
    {
        return view('infaqs.create');
    }
 
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png,svg,webp',
            'title' => 'required',
            'target' => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/infaqs', $image->hashName());

        Infaq::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'target' => $request->target
        ]);

        return redirect()->to('/infaq-disini')->with(['success' => 'Berhasil Berinfaq!']);
    }

    public function show(string $id): View
    {
        $infaq = Infaq::findOrFail($id);

        return view('infaqs.show', compact('infaq'));
    }

    public function edit(string $id): View
    {
        $infaq = Infaq::findOrFail($id);

        return view('infaqs.edit', compact('infaq'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png,svg,webp',
            'title' => 'required',
            'target' => 'required'
        ]);

        $infaq = Infaq::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/infaqs', $image->hashName());

            Storage::delete('public/infaqs/' . $infaq->image);

            $infaq->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'target' => $request->target
            ]);

        } else {

            $infaq->update([
                'title' => $request->title,
                'target' => $request->target
            ]);
        }

        return redirect()->route('infaq_disini.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $infaq = Infaq::findOrFail($id);

        Storage::delete('public/infaqs/' . $infaq->image);

        $infaq->delete();

        return redirect()->to('/infaq-disini')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
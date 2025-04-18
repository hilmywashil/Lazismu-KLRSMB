<?php

namespace App\Http\Controllers;

use App\Models\Infaq;
use App\Models\KirimInfaq;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class InfaqController extends Controller
{
    public function index(): View
    {
        $infaqs = Infaq::latest()->paginate(5);

        return view('admin.infaq.infaq', compact('infaqs'));
    }

    public function userPage(): View
    {
        $infaqs = Infaq::latest()->paginate();

        return view('infaq.infaq', compact('infaqs'));
    }

    public function create(): View
    {
        return view('admin.infaq.create');
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

        return redirect()->route('admin.infaq.index')->with(['success' => 'Berhasil Berinfaq!']);
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

        return redirect()->route('admin.infaq.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $infaq = Infaq::findOrFail($id);

        Storage::delete('public/infaqs/' . $infaq->image);

        $infaq->delete();

        return redirect()->route('admin.infaq.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    //KIRIM INFAQ
    public function dataInfaq(): View
    {
        $dataInfaqs = KirimInfaq::latest()->paginate();

        return view('admin.data.data-infaq', compact('dataInfaqs'));
    }

    public function halamanKirimInfaq($infaqId): View
    {
        $infaq = Infaq::findOrFail($infaqId);

        return view('infaq.kirim-infaq', [
            'infaq_id' => $infaq->id,
            'infaq' => $infaq, 
        ]);
    }

    public function kirimInfaq(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'jumlah' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'infaq_id' => 'required|exists:infaqs,id'
        ]);

        KirimInfaq::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jumlah' => $request->jumlah,
            'metode_pembayaran' => $request->metode_pembayaran,
            'infaq_id' => $request->infaq_id
        ]);

        if ($request->metode_pembayaran === 'transfer') {
            return redirect()->route('infaq.payment.bank', ['infaq_id' => $request->infaq_id]);
        } elseif ($request->metode_pembayaran === 'e-wallet') {
            return redirect()->route('infaq.payment.qris', ['infaq_id' => $request->infaq_id]);
        }

        return redirect()->route('infaq.index')->with(['success' => 'Berhasil Berinfaq!']);
    }
}
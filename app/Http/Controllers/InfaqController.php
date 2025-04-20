<?php

namespace App\Http\Controllers;

use App\Models\Infaq;
use App\Models\KirimInfaq;
use App\Models\KirimZakat;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class InfaqController extends Controller
{
    public function index(): View
    {
        $infaqs = Infaq::latest()->paginate();

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
        $filename = $image->hashName();
        $path = 'public/infaqs/' . $filename;

        $img = Image::make($image->getRealPath())
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode(null, 80);

        Storage::put($path, (string) $img);

        Infaq::create([
            'image' => $filename,
            'title' => $request->title,
            'target' => $request->target
        ]);

        return redirect()->route('admin.infaq.index')->with(['success' => 'Berhasil Menambahkan!']);
    }
    
    public function edit(string $id): View
    {
        $infaq = Infaq::findOrFail($id);

        return view('admin.infaq.edit', compact('infaq'));
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
            $filename = $image->hashName();
            $path = 'public/infaqs/' . $filename;

            $img = Image::make($image->getRealPath())
                ->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode(null, 80);

            Storage::put($path, (string) $img);

            Storage::delete('public/infaqs/' . $infaq->image);

            $infaq->update([
                'image' => $filename,
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
        $dataInfaqs = KirimInfaq::with('infaq')->paginate();

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

    public function destroyAllKirimInfaq(): RedirectResponse
    {
        KirimInfaq::truncate();

        return redirect()->route('admin.infaq.data')->with(['success' => 'Semua data Infaq berhasil dihapus!']);
    }

    public function riwayat(): View
    {
        $dataInfaqs = KirimInfaq::all();
        $dataZakats = KirimZakat::all();

        return view('admin.data.riwayat', compact('dataInfaqs', 'dataZakats'));
    }

    public function destroyAllRiwayat(): RedirectResponse
    {
        KirimInfaq::truncate();
        KirimZakat::truncate();

        return redirect()->route('admin.data.riwayat')->with(['success' => 'Semua data berhasil dihapus!']);
    }
}
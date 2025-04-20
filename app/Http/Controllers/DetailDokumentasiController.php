<?php

namespace App\Http\Controllers;

use App\Models\DetailDokumentasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DetailDokumentasiController extends Controller
{
    public function index($id)
    {
        $details = DetailDokumentasi::where('dokumentasi_id', $id)->latest()->get();
        return view('dokumentasis.detail.index', compact('details', 'id'));
    }
    public function adminShow($id)
    {
        $details = DetailDokumentasi::where('dokumentasi_id', $id)->latest()->get();

        return view('admin.program.detail-program', compact('details', 'id'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|image',
        ]);

        $image = $request->file('image');

        $filename = $image->hashName();
        $path = 'public/dokumentasi/' . $filename;

        $img = Image::make($image->getRealPath())
            ->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode(null, 75); 

        Storage::put($path, (string) $img);

        $dokumentasiId = $request->input('dokumentasi_id');

        DetailDokumentasi::create([
            'image' => $filename,
            'dokumentasi_id' => $dokumentasiId
        ]);

        return redirect()->back()->with('success', 'Sukses upload dan kompres gambar');
    }
    public function destroy($id): RedirectResponse
    {
        $detail = DetailDokumentasi::findOrFail($id);
        $detail->delete();

        if ($detail->image) {
            Storage::delete('public/storage/dokumentasi/' . $detail->image);
        }

        return redirect()->back()->with(['success' => 'Berhasil Menghapus!']);
    }
}

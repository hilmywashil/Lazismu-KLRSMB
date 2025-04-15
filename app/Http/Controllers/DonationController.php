<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DonationController extends Controller
{
    public function index(): View
    {
        $donations = Donation::latest()->paginate(5);
        return view('donations.index', compact('donations'));
    }

    public function create(): View
    {
        return view('donations.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
        ]);

        Donation::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        if ($request->payment_method === 'QRIS') {
            return redirect()->to('/payment-qris')->with(['success' => 'Berhasil Donasi!']);
        } elseif ($request->payment_method === 'Bank') {
            return redirect()->to('/payment-bank')->with(['success' => 'Berhasil Donasi!']);
        }

        return redirect()->to('/payment')->with(['success' => 'Berhasil Donasi!']);
    }

    public function show(string $id): View
    {
        $donation = Donation::findOrFail($id);
        return view('donations.show', compact('donation'));
    }

    public function paymentQRIS(): View
    {
        return view('payment.paymentQRIS');
    }
    
    public function paymentBank(): View
    {
        return view('payment.paymentBank');
    }
}
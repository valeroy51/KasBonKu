<?php

namespace App\Http\Controllers;

use App\Models\bukti_bayar;
use Illuminate\Http\Request;

class BuktiBayarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bukti_bayar = bukti_bayar::all();

        return view('buktiBayar.index', ['bukti_bayar' => $bukti_bayar]);
    }

    public function create()
    {
        return view('buktiBayar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'harga' => 'required',
            'metode' => 'required',
            'tanggal' => 'required',
            'notes' => 'required',
        ]);

        $bukti_bayar = bukti_bayar::create($request->all());

        return redirect()->route('buktiBayar.index')->with('success', 'Bukti Bayar created successfully');
    }

    public function confirm($id)
    {
        // Mencari data berdasarkan id
        $bukti_bayar = bukti_bayar::find($id);

        if ($bukti_bayar) {
            // Mengupdate status menjadi 'confirmed'
            $bukti_bayar->status = 'confirmed';
            $bukti_bayar->save();

            return redirect()->route('buktiBayar.index')->with('success', 'Bukti Pembayaran dikonfirmasi.');
        } else {
            return redirect()->route('buktiBayar.index')->with('error', 'Bukti Pembayaran tidak ditemukan.');
        }
    }

    public function reject($id)
    {
        // Mencari data berdasarkan id
        $bukti_bayar = bukti_bayar::find($id);

        if ($bukti_bayar) {
            // Mengupdate status menjadi 'rejected'
            $bukti_bayar->status = 'rejected';
            $bukti_bayar->save();

            return redirect()->route('buktiBayar.index')->with('success', 'Bukti Pembayaran ditolak.');
        } else {
            return redirect()->route('buktiBayar.index')->with('error', 'Bukti Pembayaran tidak ditemukan.');
        }
    }
}

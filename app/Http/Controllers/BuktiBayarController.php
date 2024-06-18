<?php

namespace App\Http\Controllers;

use App\Models\bukti_bayar;
use Illuminate\Http\Request;

class BuktiBayarController extends Controller
{
    public function index()
    {
        $bukti_bayar = bukti_bayar::all();

        return view('bukti_bayar.index', compact('bukti_bayar'));
    }

    public function payment()
    {
        return view('bukti_bayar.payment');
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

        return redirect()->route('bukti_bayar')->with('success', 'Bukti Bayar created successfully');
    }
}

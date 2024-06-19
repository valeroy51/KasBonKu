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

        return view('buktiBayar.index', compact('bukti_bayar'));
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

        return redirect()->route('buktiBayar')->with('success', 'Bukti Bayar created successfully');
    }
}

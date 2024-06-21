<?php

namespace App\Http\Controllers;
use App\Models\permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    //index
    public function index()
    {
        $permintaan = Permintaan::all();

        return view('permintaan.index', compact('permintaan'));

    }

    public function create()
    {
        return view('permintaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'barang' => 'required',
            'harga' => 'required',
            'prioritas' => 'required',
            'link' => 'required',
            'catatan' => 'required',
        ]);
        $permintaan = permintaan::create($request->all());

        return redirect()->route('permintaan')->with('success', 'Bukti Bayar created successfully');
    }
}

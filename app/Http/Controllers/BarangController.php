<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barang = Barang::all();

        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'barang' => 'required',
            'nama' => 'required',
            'prioritas' => 'required',
            'harga' => 'required',
        ]);
        $barang = Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang created successfully');
    }
}

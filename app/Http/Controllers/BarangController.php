<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();

        return view('request.confirm',compact('barang'));
    }

    public function create()
    {
        return view('request.create');
    }

    
}

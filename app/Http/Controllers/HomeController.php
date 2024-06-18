<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barang = Barang::all();

        return view('home',compact('barang'));
    }

    public function login()
    {
        return view('login');
    }
    public function payment()
    {
        return view('bukti_bayar.payment');
    }
    public function request()
    {
        return view('request');
    }

    public function first()
    {
        $barang = Barang::all();

        return view('home',compact('barang'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\barang;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(){
        $request = request::all();


        return view('barang.index', compact('request'));
    }
}

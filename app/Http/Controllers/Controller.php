<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function first()
    {
        // $request = Request::all();

        // return view('home',compact('barang'));
    return view('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

//db
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    //index
    public function index()
    {
        $siswa = Siswa::all();

        return view('home', compact('siswa'));
    }
    //create
    public function create()
    {
        return view('siswa.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'noUrut' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'kelas' => 'required',
        ]);

        $siswa = Siswa::create($request->all());

        return redirect()->route('siswa')->with('success', 'Siswa created successfully');
    }

    //edit
    public function edit($id)
    {
        $ssw = Siswa::find($id);
        return view('siswa.edit', compact('ssw'));
    }
    

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'noUrut' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'kelas' => 'required',
        ]);

        $update = [
            'noUrut' => $request->noUrut,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas' => $request->kelas,
        ];

        Siswa::whereId($id)->update($update);

        return redirect()->route('siswa')->with('success', 'Siswa edited successfully');
    }

    //destroy
    public function destroy($id)
    {
        $ssw = Siswa::find($id);
        $ssw ->delete();
        return redirect()->route('siswa')->with('success', 'Siswa deleted successfully');
    }
    public function first()
    {
        return view('home');
    }
}

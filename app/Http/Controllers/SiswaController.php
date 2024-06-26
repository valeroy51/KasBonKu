<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index
    public function index()
    {
        $users = User::all();

        return view('siswa.index', compact('users'));
    }

    public function profile($name)
    {
        $user = User::where('name', $name)->first();
        
        if (!$user) {
            abort(404);
        }

        return view('userProfile', compact('user'));
    }

    public function profileChanges()
    {
        $id = Auth::user()->id;
        $profileData = User::find();
        return view('userProfiel', compact('profileData'));
    }

    //create
    public function create()
    {
        return view('siswa.create');
    }
    // //store
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'noUrut' => 'required',
    //         'nama' => 'required',
    //         'email' => 'required',
    //         'kelas' => 'required',
    //     ]);

    //     $siswa = Siswa::create($request->all());

    //     return redirect()->route('siswa')->with('success', 'Siswa created successfully');
    // }

    // //edit
    // public function edit($id)
    // {
    //     $ssw = Siswa::find($id);
    //     return view('siswa.edit', compact('ssw'));
    // }


    // //update
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'noUrut' => 'required',
    //         'nama' => 'required',
    //         'email' => 'required',
    //         'kelas' => 'required',
    //     ]);

    //     $update = [
    //         'noUrut' => $request->noUrut,
    //         'nama' => $request->nama,
    //         'email' => $request->email,
    //         'kelas' => $request->kelas,
    //     ];

    //     Siswa::whereId($id)->update($update);

    //     return redirect()->route('siswa')->with('success', 'Siswa edited successfully');
    // }

    // //destroy
    // public function destroy($id)
    // {
    //     $ssw = Siswa::find($id);
    //     $ssw->delete();
    //     return redirect()->route('siswa')->with('success', 'Siswa deleted successfully');
    // }
}

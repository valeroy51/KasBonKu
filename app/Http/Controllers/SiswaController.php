<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index
    public function index($hashedEmail = null)
    {
        try {
            // Dekripsi email yang di-hash
            $email = $hashedEmail ? Crypt::decryptString($hashedEmail) : Auth::user()->email;
            $user = User::where('email', $email)->firstOrFail();
            $users = User::all();
            return view('siswa.index', compact('users', 'user'));
        } catch (\Exception $e) {
            abort(404);
        }
    }


    public function profile($hashedEmail)
    {
        try {
            $email = Crypt::decryptString($hashedEmail);
            $user = User::where('email', $email)->first();

            if (!$user) {
                abort(404);
            }

            return view('userProfile', compact('user'));
        } catch (\Exception $e) {
            abort(404);
        }
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

        $siswa = User::create($request->all());

        return redirect()->route('siswa')->with('success', 'Siswa created successfully');
    }

    public function profileStore(Request $request, $hashedEmail)
    {
        $email = Crypt::decryptString($hashedEmail);
        $user = User::where('email', $email)->first();
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email', // tambahkan validasi email
            'kelas' => 'required',
            'absen' => 'required',
            'alamat' => 'required',
        ]);     
    
        $updateData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'kelas' => $request->input('kelas'),
            'absen' => $request->input('absen'),
            'alamat' => $request->input('alamat'),
        ];     
    
        // Ubah penanganan pembaruan user dengan menggunakan ID yang sesuai
        User::where('email', $email)->update($updateData);
    
        return redirect()->route('siswa.index', ['hashedEmail' => $hashedEmail]);

    }
    

    //edit
    public function edit($id)
    {
        $ssw = User::find($id);
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

        User::whereId($id)->update($update);

        return redirect()->route('siswa')->with('success', 'Siswa edited successfully');
    }

    //destroy
    public function destroy($id)
    {
        $ssw = User::find($id);
        $ssw->delete();
        return redirect()->route('siswa')->with('success', 'Siswa deleted successfully');
    }
}

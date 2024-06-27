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

            // Ambil user yang sesuai dengan email
            $user = User::where('email', $email)->firstOrFail();

            // Ambil semua pengguna (untuk menampilkan semua kelas)
            $users = User::all();

            // Ambil semua kelas yang unik dari pengguna
            $classes = $users->unique('kelas')->pluck('kelas')->toArray();

            return view('siswa.index', compact('users', 'user', 'classes'));
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

        return redirect()->route('userProfile', ['hashedEmail' => $hashedEmail]);
    }


    //edit
    public function edit($id)
    {
        $user = User::find($id);
        return view('siswa.edit', compact('user'));
    }



    //update
    public function update(Request $request, $hashedEmail)
    {
        $email = Crypt::decryptString($hashedEmail);
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('siswa.index', ['hashedEmail' => $hashedEmail])->with('error', 'User not found');
        }

        $request->validate([
            'admin' => 'required',
        ]);

        $user->update([
            'admin' => $request->input('admin'),
        ]);

        return redirect()->route('siswa.index', ['hashedEmail' => $hashedEmail])->with('success', 'Siswa edited successfully');
    }


    //destroy
    public function destroy($id)
    {
        $ssw = User::find($id);
        $ssw->delete();
        return redirect()->route('siswa')->with('success', 'Siswa deleted successfully');
    }
}

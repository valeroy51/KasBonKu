<?php

namespace App\Http\Controllers;

use App\Models\bukti_bayar;
use App\Models\permintaan;
use Illuminate\Http\Request;

class BuktiBayarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bukti_bayar = bukti_bayar::all();

        return view('buktiBayar.index', ['bukti_bayar' => $bukti_bayar]);
    }

    public function create()
    {
        return view('buktiBayar.create');
    }

    public function store(Request $request)
    {
        try {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'harga' => 'required',
            'metode' => 'required',
            'tanggal' => 'required',
            'notes' => 'required',
        ]);

            $bukti_bayar = bukti_bayar::create($request->all());
            return redirect()->route('buktiBayar.create')->with('success', 'Pengiriman Bukti Pembayaran Berhasil');
        } catch (\Exception $e) {
            return redirect()->route('buktiBayar.create')->with('error', 'Terjadi kesalahan, pastikan semua input sudah benar dan coba lagi.');
        }
    }

    public function confirm($id)
    {
        // Mencari data berdasarkan id
        $bukti_bayar = bukti_bayar::find($id);
        if ($bukti_bayar) {
            // Mengupdate status menjadi 'confirmed'
            $bukti_bayar->status = 'confirmed';
            $bukti_bayar->save();
            return redirect()->route('buktiBayar.index')->with('success', 'Bukti Pembayaran dikonfirmasi.');
        } else {
            return redirect()->route('buktiBayar.index')->with('error', 'Bukti Pembayaran tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        $bbr = bukti_bayar::find($id);
        $bbr->delete();
        return redirect()->route('buktiBayar.index')
            ->with('success', 'Permintaan berhasil dihapus');
    }
}
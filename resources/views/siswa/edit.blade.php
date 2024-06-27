@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<!-- Formulir Pembayaran -->
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Formulir Bukti Pembayaran</h5>
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{route('buktiBayar.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap">
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Jumlah Pembayaran</label>
                                <input type="text" class="form-control" id="harga" name="harga" value="Rp 20.000" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="metode" class="form-label">Metode Pembayaran</label>
                                <select id="metode" name="metode" class="form-select">
                                    <option value="cash">Tunai</option>
                                    <option value="bank_transfer">Transfer Bank - 000000000 A/N Bendahara</option>
                                </select>
                            </div>
                            <div class="mb-3" id="uploadProofContainer" style="display: none;">
                                <label for="paymentProof" class="form-label">Unggah Bukti Pembayaran (JPG)</label>
                                <input type="file" class="form-control" id="paymentProof" accept="image/jpeg">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pembayaran</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan Tambahan (Opsional)</label>
                                <textarea class="form-control" id="notes" rows="3" name="notes" placeholder="Masukkan catatan tambahan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk mengelola perubahan metode pembayaran -->
<script>
    document.getElementById('metode').addEventListener('change', function() {
        var metode = this.value;
        var uploadProofContainer = document.getElementById('uploadProofContainer');

        if (metode === 'bank_transfer') {
            uploadProofContainer.style.display = 'block';
        } else {
            uploadProofContainer.style.display = 'none';
        }
    });
</script>

<!-- CSS untuk menyesuaikan tampilan input file -->
<style>
    #uploadProofContainer input[type="file"]::file-selector-text {
        color: blue;
        /* Warna biru untuk teks 'Chosen file' */
    }
</style>

<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Edit Data Siswa</h1>

        <form action="{{route('siswa.update', $ssw->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="absen" name="absen" value="{{$ssw->absen}}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$ssw->name}}" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$ssw->email}}" >
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{$ssw->kelas}}" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</section>
@endsection
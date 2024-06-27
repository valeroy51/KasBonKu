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
                <h5 class="card-title fw-semibold mb-4">Permission</h5>
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{route('siswa.update',['hashedEmail' => Crypt::encryptString($user->email)])}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="admin" class="form-label">Berikan Admin?</label>
                                <br>
                                <select id="admin" name="admin">
                                    <option value="true">Ya</option>
                                    <option value="false">Tidak</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
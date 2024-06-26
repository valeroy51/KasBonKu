@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<!--  Main wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Barang yang ingin dibeli</h5>
                    <div class="card mb-0">
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form action="{{route('permintaan.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="barang" class="form-label">Nama Barang yang Diinginkan</label>
                                    <input type="text" id="barang" name="barang" class="form-control" placeholder="Masukkan Nama Barang">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Siswa">
                                </div>
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link Pembelian</label>
                                    <input type="text" id="link" name="link" class="form-control" placeholder="Masukkan Link Pembelian">
                                </div>
                                <div class="mb-3">
                                    <label for="prioritas" class="form-label">Prioritas Barang</label>
                                    <select id="prioritas" class="form-select" name="prioritas">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                        <option value="critical">Critical</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Isi Harga Barang yang Diinginkan</label>
                                    <input type="text" id="harga" name="harga" class="form-control" placeholder="Masukkan Harga">
                                </div>
                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Catatan Tambahan (Opsional)</label>
                                    <textarea class="form-control" id="catatan" rows="3" name="catatan" placeholder="Masukkan catatan tambahan"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
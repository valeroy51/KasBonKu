@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Barang yang ingin dibeli</h5>
                <div class="card mb-0">
                    <div class="card-body">
                        <form action="{{route('permintaan.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="barang" class="form-label">Nama Barang yang Diinginkan</label>
                                <input type="text" id="barang" name="barang" class="form-control" placeholder="Input Nama Barang">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Siswa</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Input Nama Siswa">
                            </div>
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Link Pembelian</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                    <input type="text" class="form-control" id="basic-url" name="basic-url" aria-describedby="basic-addon3 basic-addon4">
                                </div>
                                <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
                            </div>
                            <div class="mb-3">
                                <label for="prioritas" class="form-label">Prioritas Barang</label>
                                <select id="prioritas" class="form-select" name="prioritas">
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                    <option value="Critical">Critical</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Isi Harga Barang yang Diinginkan</label>
                                <input type="text" id="harga" name="harga" class="form-control" placeholder="Input Harga">
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">Catatan</span>
                                    <textarea class="form-control" id="catatan" name="catatan" aria-label="catatan"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
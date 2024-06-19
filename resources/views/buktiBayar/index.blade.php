@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Daftar Pengajuan Bukti Pembayaran </h1>
        <a href="{{route('buktiBayar.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
        @if (session('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Metode</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukti_bayar as $bbr)
                    <tr>
                        <td>{{ $bbr->id }}</td>
                        <td>{{ $bbr->nama }}</td>
                        <td>{{ $bbr->kelas }}</td>
                        <td>{{ $bbr->harga }}</td>
                        <td>{{ $bbr->metode }}</td>
                        <td>{{ $bbr->tanggal }}</td>
                        <td>{{ $bbr->notes }}</td>
                        <td>
                            <a href="{{route('buktiBayar.confirm', $bbr->id)}}" class="btn btn-warning">Confirm</a>
                            <form action="{{route('buktiBayar.destroy', $bbr->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
@extends('layouts.template')

@section('title')
List Bukti Bayar
@endsection

@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-6">
                <h5 class="card-title fw-semibold mb-4">List Bukti Pembayaran</h5>
                <a href="{{route('buktiBayar.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
                @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Id</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Siswa</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kelas</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Harga</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Metode</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tanggal</h6>
                                </th>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Notes</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
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
                                        @if ($bbr->status == 'confirmed')
                                            Confirmed
                                        @elseif ($bbr->status == 'rejected')
                                            Rejected
                                        @else
                                            <form action="{{ route('buktiBayar.confirm', $bbr->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                            </form>
                                            <form action="{{ route('buktiBayar.reject', $bbr->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">Reject</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
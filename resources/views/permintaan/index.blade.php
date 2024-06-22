@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Permintaan Barang</h5>
                <a href="{{route('permintaan.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
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
                                    <h6 class="fw-semibold mb-0">Nama Barang</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Siswa</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Prioritas</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Harga</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Link Pembelian</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Catatan</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaan as $minta)
                            <tr>
                                <td>{{ $minta->id }}</td>
                                <td>{{ $minta->barang }}</td>
                                <td>{{ $minta->nama }}</td>
                                <td>{{ $minta->prioritas }}</td>
                                <td>{{ $minta->harga }}</td>
                                <td>{{ $minta->link }}</td>
                                <td>{{ $minta->catatan }}</td>
                                <td>
                                @if ($minta->status == 'confirmed')
                                            Confirmed
                                @else                                            
                                <form action="{{ route('permintaan.confirm', $minta->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Confirm</button>
                                 </form>
                                    <form action="{{route('permintaan.destroy',$minta->id)}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
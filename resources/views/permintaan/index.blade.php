@extends('layouts.template')

@section('title')
List Request
@endsection

@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">List Permintaan Barang</h5>
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
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaan as $minta)
                            <tr>
                                <td>{{ $brg->id }}</td>
                                <td>{{ $brg->nama }}</td>
                                <td>{{ $brg->barang }}</td>
                                <td>{{ $brg->harga }}</td>
                                <td>{{ $brg->prioritas }}</td>
                                <td>{{ $brg->link }}</td>
                                <td>{{ $brg->catatan }}</td>
                                <td>
                                    <a href="{{route('permintaan.edit',$brg->id)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('permintaan.destroy',$brg->id)}}" method="POST" class="d-inline">
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
            </div>
        </div>
    </div>
</div>
@endsection
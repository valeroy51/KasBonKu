@extends('layouts.template')

@section('title')
List Siswa
@endsection

@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">List Anggota Kelas</h5>
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
                                    <h6 class="fw-semibold mb-0">Absen</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $usr)
                            <tr>
                                <td>{{ $usr->id }}</td>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->absen }}</td>
                                <td>
                                    <a href="{{route('buktiBayar.confirm', $usr->id)}}" class="btn btn-warning">Confirm</a>
                                    <form action="{{route('buktiBayar.destroy', $usr->id)}}" method="POST" class="d-inline">
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
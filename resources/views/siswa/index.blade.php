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
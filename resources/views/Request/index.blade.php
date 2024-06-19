@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<!--  Main wrapper -->
<div class="body-wrapper">
    <!--  Header Start -->
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <!-- <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-mail fs-6"></i>
                                    <p class="mb-0 fs-3">My Account</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-list-check fs-6"></i>
                                    <p class="mb-0 fs-3">My Task</p>
                                </a>
                                @auth
                                <a href="{{route('logout')}}" class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{__('Logout')}}</a>
                                <form id="logout-form" action="{{route('logout')}}" method="post" class="d-none">
                                    @csrf
                                </form>
                                @else
                                <a class="btn btn-outline-primary mx-3 mt-2 d-block" href="{{route('login')}}">Login</a>
                                @endauth
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--  Header End -->
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Permintaan Barang</h5>
                    <a href="{{route('barang.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
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
                                    </th><th scope="col" class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Link Pembelian</h6>
                                    </th>
                                    <th scope="col" class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($request as $req)
                                <tr>
                                    <td>{{ $brg->id }}</td>
                                    <td>{{ $brg->nama }}</td>
                                    <td>{{ $brg->barang }}</td>
                                    <td>{{ $brg->harga }}</td>
                                    <td>{{ $brg->prioritas }}</td>                                    
                                    <td>{{ $brg->link }}</td>
                                    <td>{{ $brg->catatan }}</td>
                                    <td>
                                        <a href="{{route('barang.edit',$brg->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('barang.destroy',$brg->id)}}" method="POST" class="d-inline">
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
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
</div>
@endsection
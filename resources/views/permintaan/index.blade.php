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
                <form action="/permintaan/filter" method="GET">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input name="nama" type="text" class="form-control" placeholder="Nama" value="{{isset($_GET['nama']) ? $_GET['nama'] : ''}}">  
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Harga</label>
                                    <input name="harga" type="number" class="form-control" placeholder="Harga" value="{{isset($_GET['harga']) ? $_GET['harga'] : ''}}">  
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Prioritas</label>
                                    <select name="prioritas" class="form-select">
                                        <option value="">-</option>
                                        <option value="low" selected="{{isset($_GET['prioritas']) && $_GET['prioritas'] == 'low'}}">Low</option>
                                        <option value="medium" selected="{{isset($_GET['prioritas']) && $_GET['prioritas'] == 'medium'}}">Medium</option>
                                        <option value="high" selected="{{isset($_GET['prioritas']) && $_GET['prioritas'] == 'high'}}">High</option>
                                        <option value="critical" selected="{{isset($_GET['prioritas']) && $_GET['prioritas'] == 'critical'}}">Critical</option>
                                    </select>
                                 </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                                </div>
                            </div>
                        </form>
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
                            @forelse ($permintaan as $minta)
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
                                <td>
                                @if ($minta->prioritas == 'low')
                                     <span class="badge bg-primary w-100">Low</span>
                                 @elseif ($minta->prioritas == 'medium')
                                     <span class="badge bg-warning w-100">Medium</span>
                                 @elseif ($minta->prioritas == 'high')
                                     <span class="badge bg-warning w-100">High</span>
                                 @else
                                    <span class="badge bg-warning w-100">Critical</span>
                                @endif 
                                </td>
                            </tr>
                            @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No request found</td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<div class="container-fluid">
    <!-- Row 1 -->
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Permintaan Barang</h5>
                <!-- Form Pencarian -->
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="searchName" class="form-label">Nama</label>
                        <input id="searchName" type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="col-sm-3">
                        <label for="searchPrice" class="form-label">Harga</label>
                        <input id="searchPrice" type="number" class="form-control" placeholder="Harga">
                    </div>
                    <div class="col-sm-3">
                        <label for="searchPriority" class="form-label">Prioritas</label>
                        <select id="searchPriority" class="form-select">
                            <option value="">Semua</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="critical">Critical</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button id="searchButton" class="btn btn-primary mt-4">Search</button>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle" id="dataTable">
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
                                    <td class="border-bottom-0">{{ $minta->id }}</td>
                                    <td class="border-bottom-0">{{ $minta->barang }}</td>
                                    <td class="border-bottom-0">{{ $minta->nama }}</td>
                                    <td class="border-bottom-0">{{ $minta->prioritas }}</td>
                                    <td class="border-bottom-0">{{ $minta->harga }}</td>
                                    <td class="border-bottom-0"><a href="{{ $minta->link }}" target="_blank">Link</a></td>
                                    <td class="border-bottom-0">{{ $minta->catatan }}</td>
                                    <td class="border-bottom-0">
                                        @if ($minta->status == 'confirmed')
                                            Confirmed
                                        @else
                                            <form action="{{ route('permintaan.confirm', $minta->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                            </form>
                                            <form action="{{ route('permintaan.destroy', $minta->id) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Data Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk fitur pencarian -->
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        // Ambil nilai dari input fields
        let searchName = document.getElementById('searchName').value.toLowerCase();
        let searchPrice = document.getElementById('searchPrice').value.toLowerCase();
        let searchPriority = document.getElementById('searchPriority').value.toLowerCase();

        // Ambil semua baris data dari tabel
        let rows = document.getElementById('dataTable').getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) { // Mulai dari 1 untuk melewati header
            let cells = rows[i].getElementsByTagName('td');
            let match = true;

            // Filter berdasarkan Nama
            if (searchName && !cells[2].textContent.toLowerCase().includes(searchName)) {
                match = false;
            }

            // Filter berdasarkan Harga
            if (searchPrice && !cells[4].textContent.toLowerCase().includes(searchPrice)) {
                match = false;
            }

            // Filter berdasarkan Prioritas
            if (searchPriority && !cells[3].textContent.toLowerCase().includes(searchPriority)) {
                match = false;
            }

            // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
            rows[i].style.display = match ? '' : 'none';
        }
    });
</script>
@endsection

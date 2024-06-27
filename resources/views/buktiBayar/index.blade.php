@extends('layouts.template')

@section('title')
List Bukti Bayar
@endsection

@section('content')
<div class="container-fluid">
    <!-- Row 1 -->
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">List Bukti Pembayaran</h5>
                @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <!-- Filter Form -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="searchName" class="form-label">Nama</label>
                        <input type="text" id="searchName" class="form-control" placeholder="Nama">
                    </div>
                    <div class="col-md-3">
                        <label for="searchClass" class="form-label">Kelas</label>
                        <input type="text" id="searchClass" class="form-control" placeholder="Kelas">
                    </div>
                    <div class="col-md-3">
                        <label for="searchDate" class="form-label">Tanggal</label>
                        <input type="date" id="searchDate" class="form-control" placeholder="Tanggal">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button id="searchButton" class="btn btn-primary">Search</button>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle" id="dataTable">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Id</h6>
                                </th>
                                <th scope="col" class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
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
                                            <form action="{{ route('buktiBayar.confirm', $bbr->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                            </form>
                                            <form action="{{ route('buktiBayar.reject', $bbr->id) }}" method="POST" class="d-inline">
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

<!-- JavaScript untuk fitur pencarian -->
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        let searchName = document.getElementById('searchName').value.toLowerCase();
        let searchClass = document.getElementById('searchClass').value.toLowerCase();
        let searchDate = document.getElementById('searchDate').value;

        let rows = document.getElementById('dataTable').getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) { // Mulai dari 1 untuk melewati header
            let cells = rows[i].getElementsByTagName('td');
            let match = true;

            // Filter berdasarkan Nama Siswa
            if (searchName && !cells[1].textContent.toLowerCase().includes(searchName)) {
                match = false;
            }

            // Filter berdasarkan Kelas
            if (searchClass && !cells[2].textContent.toLowerCase().includes(searchClass)) {
                match = false;
            }

            // Filter berdasarkan Tanggal
            if (searchDate && cells[5].textContent !== searchDate) {
                match = false;
            }

            // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
            rows[i].style.display = match ? '' : 'none';
        }
    });
</script>
@endsection

@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Arus Pemasukan dan Pengeluaran Bulanan</h5>
                        </div>
                        <div>
                            <select class="form-select">
                                <option value="1">Maret 2024</option>
                                <option value="2">April 2024</option>
                                <option value="3">Mei 2024</option>
                                <option value="4">Juni 2024</option>
                            </select>
                        </div>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Target Kas Bulanan</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">Rp.720.000</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <span
                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last year</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-4">
                                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                            <span class="fs-2">2022</span>
                                        </div>
                                        <div>
                                            <span
                                                class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                            <span class="fs-2">2021</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="breakup"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Monthly Earnings -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold"> Pendapatan Bulanan </h5>
                                    <h4 class="fw-semibold mb-3">Rp.20.000</h4>
                                    <div class="d-flex align-items-center pb-1">
                                        <span
                                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-down-right text-danger"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last year</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-currency-dollar fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Riwayat Transaksi Section -->
            <div class="col-lg-5 col-md-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <h5 class="card-title fw-semibold">Riwayat Transaksi</h5>
                        </div>
                        <ul class="timeline-widget mb-0 position-relative mb-n5">
                            <ul class="timeline">
                                @forelse($buktibayar as $bbr)
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            {{ \Carbon\Carbon::parse($bbr->tanggal)->format('d M Y') }}
                                        </div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1" style="margin-top: -2rem;">
                                            Pembayaran diterima dari {{ $bbr->nama }} sejumlah {{ $bbr->harga }}.
                                        </div>
                                    </li>
                                @empty
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">-</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-secondary flex-shrink-0 my-8"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Tidak ada transaksi.</div>
                                    </li>
                                @endforelse
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Permintaan Barang Section -->
            <div class="col-lg-7 col-md-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Permintaan Barang</h5>
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
                                            <h6 class="fw-semibold mb-0">Nama Barang</h6>
                                        </th>
                                        <th scope="col" class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Prioritas</h6>
                                        </th>
                                        <th scope="col" class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Harga</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permintaan as $minta)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $minta->id }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $minta->nama }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $minta->barang }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                @if ($minta->prioritas == 'low')
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-primary rounded-3 fw-semibold">Low</span>
                                                    </div>
                                                @elseif ($minta->prioritas == 'medium')
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-secondary rounded-3 fw-semibold">Medium</span>
                                                    </div>
                                                @elseif ($minta->prioritas == 'high')
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-danger rounded-3 fw-semibold">High</span>
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-success rounded-3 fw-semibold">Critical</span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{ $minta->harga }}</h6>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Permintaan Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
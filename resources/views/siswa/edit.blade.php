@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Edit Data Siswa</h1>

        <form action="{{route('siswa.update', $ssw->id)}}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="noUrut" class="form-label">No Urut</label>
                <input type="text" class="form-control" id="noUrut" name="noUrut" value="{{$ssw->noUrut}}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$ssw->nama}}" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$ssw->email}}" >
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{$ssw->kelas}}" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</section>
@endsection
@extends('layouts.template')

@section('title')
KasBonKu
@endsection

@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Daftar Siswa</h1>
        <a href="{{route('siswa.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
        @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Urut</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $ssw)
                <tr>
                    <td>{{ $ssw->id }}</td>
                    <td>{{ $ssw->noUrut }}</td>
                    <td>{{ $ssw->nama }}</td>
                    <td>{{ $ssw->email }}</td>
                    <td>{{ $ssw->kelas }}</td>

                    <td>
                        <a href="{{route('siswa.edit',$ssw->id)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('siswa.destroy',$ssw->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
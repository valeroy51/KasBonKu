@extends('layouts.template')

@section('title')
Profile
@endsection

@section('content')
<div class="container-fluid">
  <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ asset('../assets/images/profile/cleanface.png') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->name }}</h5>
              <p class="text-muted mb-1">{{ $user->kelas }}</p>
              <p class="text-muted mb-4">{{ $user->absen }}</p>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <div class="col-sm-4">
                    <p class="mb-0">Nama Lengkap</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->name }}</p>
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <div class="col-sm-4">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <div class="col-sm-4">
                    <p class="mb-0">Kelas</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->kelas }}</p>
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <div class="col-sm-4">
                    <p class="mb-0">Absen</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->absen }}</p>
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <div class="col-sm-4">
                    <p class="mb-0">Alamat Rumah</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->alamat }}</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              @php
              $hashedEmail = Crypt::encryptString(Auth::user()->email);
              @endphp
              <form action="{{ route('profileStore', ['hashedEmail' => $hashedEmail]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" id="name" name="name" class="form-control" value="{{$user -> name}}">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" name="email" class="form-control" value="{{$user -> email}}">
                </div>
                <div class="mb-3">
                  <label for="kelas" class="form-label">Kelas</label>
                  <input type="text" id="kelas" name="kelas" class="form-control" value="{{$user -> kelas}}">
                </div>
                <div class="mb-3">
                  <label for="absen" class="form-label">Absen</label>
                  <input type="text" id="absen" name="absen" class="form-control" value="{{$user -> absen}}">
                </div>
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat Rumah</label>
                  <input class="form-control" id="alamat" rows="2" name="alamat" value="{{$user -> alamat}}"></input>
                </div>
                <button type="submit" class="btn btn-primary">Konfirmasi Perubahan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
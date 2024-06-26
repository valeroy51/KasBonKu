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
              <img src="{{ asset('../assets/images/profile/cleanface.png')}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
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
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama Lengkap</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Kelas</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->kelas }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Absen</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->absen }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Alamat Rumah</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <button type="submit" class="btn btn-danger mb-0">Delete Account</button>
                </div>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary mb-0 col-sm-9">Update Data Kamu</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
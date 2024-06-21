@extends('layouts.templogreg')

@section('title')
Registrasi
@endsection

@section('content')
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0 ">
                        <div class="card-body">
                            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                            </a>
                            <p class="text-center">Your Social Campaigns</p>
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus aria-describedby="textHelp">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">{{ __('Kelas') }}</label>
                                    <select id="kelas" name="kelas" class="form-select @error('kelas') is-invalid @enderror" required autocomplete="kelas" aria-describedby="kelasHelp">
                                        <option value="10 Mipa A">10 Mipa A</option>
                                        <option value="10 Mipa B">10 Mipa B</option>
                                        <option value="10 Mipa C">10 Mipa C</option>
                                        <option value="11 Mipa A">11 Mipa A</option>
                                        <option value="11 Mipa B">11 Mipa B</option>
                                        <option value="11 Mipa C">11 Mipa C</option>
                                        <option value="12 Mipa A">12 Mipa A</option>
                                        <option value="12 Mipa B">12 Mipa B</option>
                                        <option value="12 Mipa C">12 Mipa C</option>
                                        <option value="10 IPS A">10 IPS A</option>
                                        <option value="10 IPS B">10 IPS B</option>
                                        <option value="10 IPS C">10 IPS C</option>
                                        <option value="11 IPS A">11 IPS A</option>
                                        <option value="11 IPS B">11 IPS B</option>
                                        <option value="11 IPS C">11 IPS C</option>
                                        <option value="12 IPS A">12 IPS A</option>
                                        <option value="12 IPS B">12 IPS B</option>
                                        <option value="12 IPS C">12 IPS C</option>
                                    </select>
                                    @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="absen" class="form-label">{{ __('Nomor Induk Siswa') }}</label>
                                    <input type="number" class="form-control @error('absen') is-invalid @enderror" name="absen" value="{{ old('absen') }}" required autocomplete="absen" id="absen" aria-describedby="absenHelp" min="1" max="36" oninput="validity.valid||(value='');">
                                    @error('absen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" aria-describedby="emailHelp">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" id="password-confirm">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">{{ __('Register') }}</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
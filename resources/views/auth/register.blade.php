<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo/logo-favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo/logo-favicon.png') }}">
    <meta name="description" content="Register - Recruitment Admo">
    <meta name="author" content="Recruitment Admo">
    <meta name="keywords" content="Recruitment Admo">

    <!-- Title Page-->
    <title>Register - Recruitment Admo</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('template/registrasi/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/registrasi/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('template/registrasi/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/registrasi/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('template/registrasi/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-gra-02 p-t-30 p-b-30 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Registrasi</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nama Lengkap</label>
                                <input class="input--style-4 @error('name') is-invalid @enderror" value="{{ old('name') }}" required type="text" id="name" name="name" placeholder="Nama anda">
                                @error('name')
                                <span class="invalid-feedback alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">NRP</label>
                                <input class="input--style-4 @error('nrp') is-invalid @enderror" value="{{ old('nrp') }}" required type="text" name="nrp" id="nrp" placeholder="12345678">
                                @error('nrp')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Jabatan</label>
                                <input class="input--style-4 @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" type="text" name="jabatan" required id="jabatan" placeholder="Manajer, dll..">
                                @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Section</label>
                                <input class="input--style-4 @error('section') is-invalid @enderror" value="{{ old('section') }}" type="text" required name="section" id="section" placeholder="Plant Tire, dll..">
                                @error('section')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Departemen</label>
                                <input class="input--style-4 @error('departemen') is-invalid @enderror" value="{{ old('departemen') }}" required type="text" name="departemen" placeholder="Plant, dll..">
                                @error('departemen')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nama atasan / NRP atasan</label>
                                <input class="input--style-4 @error('nama_nrp_atasan') is-invalid @enderror" value="{{ old('nama_nrp_atasan') }}" required type="text" name="nama_nrp_atasan" id="nama_nrp_atasan" placeholder="Nama / 12345678">
                                @error('nama_nrp_atasan')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="label">Status</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="status" required class=" @error('status') is-invalid @enderror" >
                                <option value="PKWT 1" disabled selected>Pilih Status</option>
                                <option value="PKWT 1">PKWT 1</option>
                                <option value="PKWT 2">PKWT 2</option>
                                <option value="PERMANEN">PERMANEN</option>
                            </select>
                            <div class="select-dropdown"></div>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4 @error('email') is-invalid @enderror" value="{{ old('email') }}" required type="email" name="email" id="email" placeholder="emailanda@email.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nomor Handphone</label>
                                <input class="input--style-4 @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" required type="text" name="no_hp" id="no_hp" placeholder="08123456789">
                                @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Password</label>
                                <input class="input--style-4  @error('password') is-invalid @enderror" required type="password" name="password" id="password" placeholder="Password anda">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Konfirmasi Password</label>
                                <input class="input--style-4" type="password" name="password_confirmation" id="password-konfirmasi" placeholder="Konfirmasi password anda">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--green" type="submit">Daftar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{ asset('template/registrasi/vendor/jquery/jquery.min.js') }}"></script>
<!-- Vendor JS-->
<script src="{{ asset('template/registrasi/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('template/registrasi/vendor/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('template/registrasi/vendor/datepicker/daterangepicker.js') }}"></script>

<!-- Main JS-->
<script src="{{ asset('template/registrasi/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="nrp" class="col-md-4 col-form-label text-md-right">{{ __('NRP') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="nrp" type="text" class="form-control @error('nrp') is-invalid @enderror" name="nrp" value="{{ old('nrp') }}" required autocomplete="nrp" autofocus>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required autocomplete="jabatan" autofocus>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="section" class="col-md-4 col-form-label text-md-right">{{ __('Section') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="section" type="text" class="form-control @error('section') is-invalid @enderror" name="section" value="{{ old('section') }}" required autocomplete="section" autofocus>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="departemen" class="col-md-4 col-form-label text-md-right">{{ __('Departemen') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="departemen" type="text" class="form-control @error('departemen') is-invalid @enderror" name="departemen" value="{{ old('departemen') }}" required autocomplete="departemen" autofocus>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="nama_nrp_atasan" class="col-md-4 col-form-label text-md-right">{{ __('Nama NRP Atasan') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="nama_nrp_atasan" type="text" class="form-control @error('nama_nrp_atasan') is-invalid @enderror" name="nama_nrp_atasan" value="{{ old('nama_nrp_atasan') }}" required autocomplete="nama_nrp_atasan" autofocus>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="no_hp" class="col-md-4 col-form-label text-md-right">{{ __('No HP') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

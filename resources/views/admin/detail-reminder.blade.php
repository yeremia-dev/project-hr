@extends('layouts.dashboard')
@section('custom-page-title')
    Detail Kontrak {{ $reminder->kontrak->karyawan->nama_lengkap }}
@endsection
@section('custom-style')

@endsection
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    {{--    <li class="nav-item ">--}}
    {{--        <a class="nav-link" href="#">--}}
    {{--            <i class="material-icons">person</i>--}}
    {{--            <p>User Profile</p>--}}
    {{--        </a>--}}
    {{--    </li>--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Data Karyawan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.karyawan.update', $reminder->kontrak->karyawan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nama Lengkap</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->nama_lengkap }}" name="nama_lengkap" id="nama_lengkap">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">NRP</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->nrp }}" name="nrp" id="nrp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Jabatan</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->jabatan }}" name="jabatan" id="jabatan">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Section</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->section }}" name="section" id="section">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Departmen</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->departemen }}" name="departemen" id="departemen">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nama / NRP Atasan</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->nama_nrp_atasan }}" name="nama_nrp_atasan" id="nama_nrp_atasan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->email }}" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nomor Handphone</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->no_hp }}" name="no_hp" id="no_hp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Status</label>
                                        <input type="text" class="form-control" required value="{{ $reminder->kontrak->karyawan->status }}" name="status" id="status">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Tracking Progress</h4>
                    </div>
                    <div class="card-body">
                        @if(count($reminder->kontrak->kemajuan) > 0)
                            @foreach($reminder->kontrak->kemajuan as $kemajuan)
                                <div class="row mb-2">
                                    <div class="col-md-12 col-12">
                                        <h4>{{ $kemajuan->isi_kemajuan }}</h4>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-muted">{{ date('d-m-Y', strtotime($kemajuan->tanggal_kemajuan)) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row text-center">
                                <div class="col-md-12 col-12">
                                    <h4>Data Tracking Kosong</h4>
                                </div>
                            </div>
                       @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Data Kontrak</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.reminder.update', $reminder->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Join Date</label>
                                        <input type="text" disabled class="form-control" value="{{ date('d-m-Y', strtotime($reminder->kontrak->tanggal_masuk)) }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Berakhir Kontrak</label>
                                        <input type="text" disabled class="form-control" value="{{ date('d-m-Y', strtotime($reminder->kontrak->tanggal_berakhir)) }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Pengingat (H-)</label>
                                        <input type="text" disabled class="form-control" value="{{ $reminder->batasan_pengingat }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="">Join Date</label>
                                        <input type="date" class="form-control" required name="tanggal_masuk">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="">Berakhir Kontrak</label>
                                        <input type="date" class="form-control" required name="tanggal_berakhir">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Pengingat (H-)</label>
                                        <input type="number" class="form-control" required name="pengingat" min="1">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Kontrak</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@extends('layouts.dashboard')
@section('custom-page-title')
    Progress User {{ $kontrak->karyawan->nama_lengkap }}
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
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Progress</h4>
                    </div>
                    <div class="card-body mt-4">
                        @if(count($kemajuans) > 0)
                            @foreach($kemajuans as $kemajuan)
                                <div class="row mb-3">
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
                                    <h4>Anda belom pernah menambahkan progress</h4>
                                </div>
                            </div>
                        @endif
                        <hr>
                        <form action="{{ route('user.kemajuan.store') }}" method="POST">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Isi Progress</label>
                                        <input type="text" class="form-control" required name="isi_kemajuan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Tanggal Progress</label>
                                        <input type="date" class="form-control" required name="tanggal_kemajuan">
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $kontrak->id }}" name="kontrak_id">
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Tambah Progress</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


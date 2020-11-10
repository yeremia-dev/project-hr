@extends('layouts.dashboard')
@section('custom-page-title')
    Dashboard
@endsection
@section('navbar')
    <li class="nav-item active">
        <a class="nav-link" href="./dashboard.html">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
@endsection
@section('content')
    @if($kontrak != null)
        @if($kontrak->reminder->is_confirm == 0 && $kontrak->reminder->is_sent == 1)
            <div class="alert alert-info alert-with-icon" data-notify="container">
                <i class="material-icons" data-notify="icon">add_alert</i>
{{--                <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                    <i class="material-icons">close</i>--}}
{{--                </button>--}}
                <span data-notify="message">Silahkan melakukan konfirmasi email reminder dan mengisi tracking progress dengan mengklik <a href="{{ route('user.konfirmasi', $kontrak->reminder->id) }}" class="text-muted">Konfirmasi</a> </span>
            </div>
        @endif
    @endif
    <div class="card">
        <div class="card-header card-header-success">
            <h4 class="card-title ">Data Kontrak</h4>
            {{--            <p class="card-category">Data-Data</p>--}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <th>
                        NRP
                    </th>
                    <th>
                        Join Date
                    </th>
                    <th>
                        Berakhir Kontrak
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Section
                    </th>
                    <th>
                        Departemen
                    </th>
                    <th>

                    </th>
                    </thead>
                    <tbody>
                    @if($kontrak != null)
                        <tr>
                            <td>
                                {{ $kontrak->karyawan->nrp }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($kontrak->tanggal_masuk)) }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($kontrak->tanggal_berakhir)) }}
                            </td>
                            <td>
                                {{ $kontrak->karyawan->status }}
                            </td>
                            <td>
                                {{ $kontrak->karyawan->section }}
                            </td>
                            <td>
                                {{ $kontrak->karyawan->departemen }}
                            </td>
                            <td class="text-primary">
                                <a href="{{ route('user.detail-kemajuan',$kontrak->id) }}">Lihat Progress</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="7" class="text-center"><h3>Anda tidak memiliki kontrak saat ini</h3></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
{{--                {{ $reminders->links() }}--}}
            </div>
        </div>
    </div>
@endsection

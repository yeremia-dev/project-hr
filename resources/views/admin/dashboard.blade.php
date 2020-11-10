@extends('layouts.dashboard')
@section('custom-page-title')
    Dashboard
@endsection
@section('custom-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('navbar')
    <li class="nav-item active">
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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addData">
                Tambah Data
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kontrak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-form" action="{{ route('admin.kontrak.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="col-12">
                                    <label for="cari">Nama Karyawan</label><br>
                                </div>
                                <div class="col-auto">
                                    <select class="cari form-control" id="cari" style="width:260px; height: 100px" required name="id_karyawan">
                                        @foreach($karyawans as $karyawan)
                                            <option value="{{ $karyawan->id }}">{{ $karyawan->nrp }} / {{ $karyawan->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="col-auto">
                                    <label for="tanggal_masuk">Join Date</label><br>
                                </div>
                                <div class="col-auto">
                                    <input type="date" required class="form-control tanggal_masuk" name="tanggal_masuk" id="tanggal_masuk">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-auto">
                                    <label for="tanggal_berakhir">Berakhir Kontrak</label><br>
                                </div>
                                <div class="col-auto">
                                    <input type="date" required class="form-control tanggal_berakhir" name="tanggal_berakhir" id="tanggal_berakhir">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="col-12">
                                    <label for="pengingat">Pengingat (H-)</label><br>
                                </div>
                                <div class="col-auto">
                                    <input type="number" required class="form-control" name="pengingat" min="1">
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  onclick="event.preventDefault();
                                                     document.getElementById('add-form').submit();">Tambah</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header card-header-success">
            <h4 class="card-title ">Data Reminder</h4>
{{--            <p class="card-category">Data-Data</p>--}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Nama
                    </th>
                    <th>
                        Join Date
                    </th>
                    <th>
                        Berakhir Kontrak
                    </th>
                    <th>
                        Tanggal Pengingat
                    </th>
                    <th>
                        Status Reminder
                    </th>
                    <th>

                    </th>
                    </thead>
                    <tbody>
                    @if(count($reminders) != 0)
                        @foreach($reminders as $key => $reminder)
                        <tr>
                            <td>
                                {{ $reminder->kontrak->karyawan->nama_lengkap }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($reminder->kontrak->tanggal_masuk)) }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($reminder->kontrak->tanggal_berakhir)) }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($reminder->tanggal_pengingat)) }}
                            </td>
                            <td>
                                @if($reminder->is_sent == 0)
                                    Reminder Belum Dikirim
                                @else
                                    @if($reminder->is_confirm == 0)
                                        Reminder Sudah Dikirim, Menunggu Konfirmasi
                                    @else
                                        Reminder Sudah Dikonfirmasi
                                    @endif
                                @endif
                            </td>
                            <td class="text-primary">
                                <a href="{{ route('admin.reminder.show',$reminder->id) }}">Lihat Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Data Reminder Kosong</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {{ $reminders->links() }}
            </div>
        </div>
    </div>

{{--    <div class="table-responsive">--}}
{{--        <table class="table table-bordered">--}}
{{--            <thead>--}}
{{--                <tr>--}}
{{--                    <td>Nama</td>--}}
{{--                    <td>Tanggal Masuk</td>--}}
{{--                    <td>Tanggal Keluar</td>--}}
{{--                    <td>Waktu Pengingat</td>--}}
{{--                </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--                @foreach($reminders as $key => $reminder)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $reminder->kontrak->karyawan->nama_lengkap }}</td>--}}
{{--                        <td>{{ $reminder->kontrak->tanggal_masuk }}</td>--}}
{{--                        <td>{{ $reminder->kontrak->tanggal_berakhir }}</td>--}}
{{--                        <td>{{ $reminder->tanggal_pengingat }}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        {{ $reminders->links() }}--}}
{{--    </div>--}}

@endsection

@section('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.cari').select2({
                dropdownParent: $('#addData')
            });
        });
    </script>
@endsection

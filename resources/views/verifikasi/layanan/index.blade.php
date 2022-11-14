@extends('layout.main')

@section('content')
@if ( session()->has('success') )
    <div class="alert mt-4 alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@include('sweetalert::alert')


<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <a href="/laporan/pdfPengajuanLayanan" class="btn btn-success">
                Export PDF
            </a>

            <!-- ANALIS -->
            @if(auth()->user()->role == "analis")
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr style="background-color: #DAE2B6;">
                                <th style="border-radius: 10px 0px 0px 10px;color: #5F7161;">Pengujian</th>
                                <th style="color: #5F7161;">Parameter</th>
                                <th style="color: #5F7161;text-align: center;">Tanggal Pengajuan</th>
                                <th style="color: #5F7161;text-align: center;">Tanggal Verifikasi</th>
                                <th style="border-radius: 0px 10px 10px 0px;text-align: center;color: #5F7161;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $pengajuanLayanan as $pl )
                                @if($pl->userId == auth()->user()->id)
                                    <tr>
                                        <td>{{ $pl->layanan->pengujian->namaPengujian }}</td>
                                        <td>{{ $pl->layanan->parameter }}</td>
                                        <td style="text-align: center;">{{ $pl->tanggalPengajuan }}</td>
                                        <td style="text-align: center;">{{ $pl->tanggalVerifikasi }}</td>
                                        <td style="text-align: center;">
                                            @if($pl->confirmed == 1)
                                                <span class="badge badge-success">Sudah di Confirm</span>
                                            @elseif($pl->confirmed == 2)
                                                <span class="badge badge-warning">Pengajuan ditolak</span>
                                            @else
                                                <span class="badge badge-danger">Belum di Confirm</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
            @endif 
            <!-- END ANALISIS -->
            
            <!-- VERIFIKATOR -->
            @if(auth()->user()->role == "verifikator")
            <div class="widget-content widget-content-area br-6">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr style="background-color: #DAE2B6;">
                            <th style="border-radius: 10px 0px 0px 10px;color: #5F7161;">No</th>
                            <th style="color: #5F7161;">Nama</th>
                            <th style="color: #5F7161;">Pengujian</th>
                            <th style="color: #5F7161;">Parameter</th>
                            <th style="color: #5F7161;">Tanggal Pengajuan</th>
                            <th style="color: #5F7161;">Tanggal Verifikasi</th>
                            <th style="color: #5F7161;">Status</th>
                            <th style="border-radius: 0px 10px 10px 0px;text-align: center;color: #5F7161;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $pengajuanLayanan as $pl )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pl->user->name }}</td>
                            <td>{{ $pl->layanan->pengujian->namaPengujian }}</td>
                            <td>{{ $pl->layanan->parameter }}</td>
                            <td>{{ $pl->tanggalPengajuan }}</td>
                            <td>{{ $pl->tanggalVerifikasi }}</td>
                            <td>
                                @if($pl->confirmed == 1)
                                    <span class="badge badge-success">Sudah di Confirm</span>
                                @elseif($pl->confirmed == 2)
                                    <span class="badge badge-warning">Pengajuan ditolak</span>
                                @else
                                    <span class="badge badge-danger">Belum di Confirm</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <a href="#accData{{ $pl->id }}" data-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path></svg>
                                </a>


                                <!-- MODAL ACC DATA -->
                                <div class="modal fade" id="accData{{ $pl->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addUser">Detail Pengajuan Layanan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle">
                                                            <thead>
                                                            </thead>
                                                            <tbody style="text-align: left;border: none;">
                                                                <tr>
                                                                    <td colspan="1">No</td>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Nama</td>
                                                                    <td>{{ $pl->user->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Pengujian</td>
                                                                    <td>{{ $pl->layanan->pengujian->namaPengujian }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Parameter</td>
                                                                    <td>{{ $pl->layanan->parameter }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">keterangan</td>
                                                                    <td>{{ $pl->keterangan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Tanggal Pengajuan</td>
                                                                    <td>{{ $pl->created_at->format('d/m/Y') }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <br>
                                                        <br>
                                    
                                                        <table class="">
                                                            <thead>
                                                                <th>Bahan Yang dibutuhkan</th>
                                                            </thead>
                                                                <tbody style="font-weight: bold;">
                                                                    @foreach( $pl->layanan->bahanLayanan as $bala )
                                                                    <tr>
                                                                        <th>{{ $bala->bahan->namaReagent }}</th>
                                                                        <th>{{ $bala->stokBahan }}</th>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                @if($pl->confirmed == 0)
                                                    <!-- FORM ACC PENGAJUAN LAYANAN -->
                                                    <form action="/pengajuanLayanan/{{ $pl->id }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        @foreach( $pl->layanan->bahanLayanan as $bala )
                                                        <input type="text" class="" name="bahanId[]" value="{{ $bala->bahanId }}" hidden>
                                                        <input type="text" class="" name="stokBahan[]" value="{{ $bala->stokBahan }}" hidden>
                                                        @endforeach
                                                        <input type="text" class="" name="confirmed" value="1" hidden>
                                                        <input type="date" name="tanggalVerifikasi" id="date-picker" hidden>
                                                        <script>
                                                            var date = new Date();
                                                            var year = date.getFullYear();
                                                            var month = String(date.getMonth()+1).padStart(2,'0');
                                                            var todayDate = String(date.getDate()).padStart(2,'0');
                                                            var datePattern = year + '-' + month + '-' + todayDate;
                                                            document.getElementById("date-picker").value = datePattern;
                                                        </script>
                                                        <input type="" name="userVerifikasi" value="{{ auth()->user()->id }}" hidden>
                                                        <button class="btn btn-success rounded me-1" type="submit">ACC</button>
                                                    </form>
                                                    <!-- END FORM ACC PENGAJUAN LAYANAN -->

                                                    <!-- FORM TOLAK PENGAJUAN LAYANAN -->
                                                    <form action="/verifikasi/tolakpl/{{ $pl->id }}" method="post">
                                                        @csrf
                                                        <input type="text" class="" name="confirmed" value="2" hidden>
                                                        <input type="text" class="" name="id" value="{{ $pl->id }}" hidden>
                                                        <button class="btn btn-danger rounded me-1" type="submit">Tolak</button>
                                                    </form>
                                                    <!-- END FORM TOLAK PENGAJUAN LAYANAN -->

                                                    @endif
                                                    <button type="button" class="btn btn-secondary Close" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!-- END ACC DATA -->

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> 
            @endif   
            <!-- END VERIFIKATOR -->

            <!-- KEPALA -->
            @if(auth()->user()->role == "kepala")
            <div class="widget-content widget-content-area br-6">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr style="background-color: #DAE2B6;">
                            <th style="border-radius: 10px 0px 0px 10px;color: #5F7161;">No</th>
                            <th style="color: #5F7161;">Nama</th>
                            <th style="color: #5F7161;">Pengujian</th>
                            <th style="color: #5F7161;">Parameter</th>
                            <th style="color: #5F7161;">Tanggal Pengajuan</th>
                            <th style="color: #5F7161;">Tanggal Verifikasi</th>
                            <th style="color: #5F7161;">Status</th>
                            <th style="border-radius: 0px 10px 10px 0px;text-align: center;color: #5F7161;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $pengajuanLayanan as $pl )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pl->user->name }}</td>
                            <td>{{ $pl->layanan->pengujian->namaPengujian }}</td>
                            <td>{{ $pl->layanan->parameter }}</td>
                            <td>{{ $pl->tanggalPengajuan }}</td>
                            <td>{{ $pl->tanggalVerifikasi }}</td>
                            <td>
                                @if($pl->confirmed == 1)
                                    <span class="badge badge-success">Sudah di Confirm</span>
                                @elseif($pl->confirmed == 2)
                                    <span class="badge badge-warning">Pengajuan ditolak</span>
                                @else
                                    <span class="badge badge-danger">Belum di Confirm</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <a href="#accData{{ $pl->id }}" data-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path></svg>
                                </a>


                                <!-- MODAL ACC DATA -->
                                <div class="modal fade" id="accData{{ $pl->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addUser">Detail Pengajuan Layanan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle">
                                                            <thead>
                                                            </thead>
                                                            <tbody style="text-align: left;border: none;">
                                                                <tr>
                                                                    <td colspan="1">No</td>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Nama</td>
                                                                    <td>{{ $pl->user->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Pengujian</td>
                                                                    <td>{{ $pl->layanan->pengujian->namaPengujian }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Parameter</td>
                                                                    <td>{{ $pl->layanan->parameter }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">keterangan</td>
                                                                    <td>{{ $pl->keterangan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Tanggal Pengajuan</td>
                                                                    <td>{{ $pl->created_at->format('d/m/Y') }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <br>
                                                        <br>
                                    
                                                        <table class="">
                                                            <thead>
                                                                <th>Bahan Yang dibutuhkan</th>
                                                            </thead>
                                                                <tbody style="font-weight: bold;">
                                                                    @foreach( $pl->layanan->bahanLayanan as $bala )
                                                                    <tr>
                                                                        <th>{{ $bala->bahan->namaReagent }}</th>
                                                                        <th>{{ $bala->stokBahan }}</th>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                @if($pl->confirmed == 0)
                                                    <!-- FORM ACC PENGAJUAN LAYANAN -->
                                                    <form action="/pengajuanLayanan/{{ $pl->id }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        @foreach( $pl->layanan->bahanLayanan as $bala )
                                                        <input type="text" class="" name="bahanId[]" value="{{ $bala->bahanId }}" hidden>
                                                        <input type="text" class="" name="stokBahan[]" value="{{ $bala->stokBahan }}" hidden>
                                                        @endforeach
                                                        <input type="text" class="" name="confirmed" value="1" hidden>
                                                        <input type="date" name="tanggalVerifikasi" id="date-picker" hidden>
                                                        <script>
                                                            var date = new Date();
                                                            var year = date.getFullYear();
                                                            var month = String(date.getMonth()+1).padStart(2,'0');
                                                            var todayDate = String(date.getDate()).padStart(2,'0');
                                                            var datePattern = year + '-' + month + '-' + todayDate;
                                                            document.getElementById("date-picker").value = datePattern;
                                                        </script>
                                                        <input type="" name="userVerifikasi" value="{{ auth()->user()->id }}" hidden>
                                                        <button class="btn btn-success rounded me-1" type="submit">ACC</button>
                                                    </form>
                                                    <!-- END FORM ACC PENGAJUAN LAYANAN -->

                                                    <!-- FORM TOLAK PENGAJUAN LAYANAN -->
                                                    <form action="/verifikasi/tolakpl/{{ $pl->id }}" method="post">
                                                        @csrf
                                                        <input type="text" class="" name="confirmed" value="2" hidden>
                                                        <input type="text" class="" name="id" value="{{ $pl->id }}" hidden>
                                                        <button class="btn btn-danger rounded me-1" type="submit">Tolak</button>
                                                    </form>
                                                    <!-- END FORM TOLAK PENGAJUAN LAYANAN -->

                                                    @endif
                                                    <button type="button" class="btn btn-secondary Close" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!-- END ACC DATA -->

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> 
            @endif  
            <!-- END KEPALA -->

            <!-- SUBAG -->
            @if(auth()->user()->role == "subag")
            <div class="widget-content widget-content-area br-6">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr style="background-color: #DAE2B6;">
                            <th style="border-radius: 10px 0px 0px 10px;color: #5F7161;">No</th>
                            <th style="color: #5F7161;">Nama Analis</th>
                            <th style="color: #5F7161;">Pengujian</th>
                            <th style="color: #5F7161;">Parameter</th>
                            <th style="color: #5F7161;">Tanggal Pengajuan</th>
                            <th style="color: #5F7161;">Tanggal Verifikasi</th>
                            <th style="color: #5F7161;">Nama Verifikasi</th>
                            <th style="color: #5F7161;">Status</th>
                            <th style="border-radius: 0px 10px 10px 0px;text-align: center;color: #5F7161;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $pengajuanLayanan as $pl )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pl->user->name }}</td>
                            <td>{{ $pl->layanan->pengujian->namaPengujian }}</td>
                            <td>{{ $pl->layanan->parameter }}</td>
                            <td>{{ $pl->tanggalPengajuan }}</td>
                            <td>{{ $pl->tanggalVerifikasi }}</td>
                            <td>{{ $pl->userVerif->name }}</td>
                            <td>
                                @if($pl->confirmed == 1)
                                    <span class="badge badge-success">Sudah di Confirm</span>
                                @elseif($pl->confirmed == 2)
                                    <span class="badge badge-warning">Pengajuan ditolak</span>
                                @else
                                    <span class="badge badge-danger">Belum di Confirm</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <a href="#accData{{ $pl->id }}" data-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path></svg>
                                </a>


                                <!-- MODAL ACC DATA -->
                                <div class="modal fade" id="accData{{ $pl->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addUser">Detail Pengajuan Layanan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle">
                                                            <thead>
                                                            </thead>
                                                            <tbody style="text-align: left;border: none;">
                                                                <tr>
                                                                    <td colspan="1">No</td>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Nama</td>
                                                                    <td>{{ $pl->user->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Pengujian</td>
                                                                    <td>{{ $pl->layanan->pengujian->namaPengujian }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Parameter</td>
                                                                    <td>{{ $pl->layanan->parameter }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">keterangan</td>
                                                                    <td>{{ $pl->keterangan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">Tanggal Pengajuan</td>
                                                                    <td>{{ $pl->created_at->format('d/m/Y') }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <br>
                                                        <br>
                                    
                                                        <table class="">
                                                            <thead>
                                                                <th>Bahan Yang dibutuhkan</th>
                                                            </thead>
                                                                <tbody style="font-weight: bold;">
                                                                    @foreach( $pl->layanan->bahanLayanan as $bala )
                                                                    <tr>
                                                                        <th>{{ $bala->bahan->namaReagent }}</th>
                                                                        <th>{{ $bala->stokBahan }}</th>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                @if($pl->confirmed == 0)
                                                    <!-- FORM ACC PENGAJUAN LAYANAN -->
                                                    <form action="/pengajuanLayanan/{{ $pl->id }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        @foreach( $pl->layanan->bahanLayanan as $bala )
                                                        <input type="text" class="" name="bahanId[]" value="{{ $bala->bahanId }}" hidden>
                                                        <input type="text" class="" name="stokBahan[]" value="{{ $bala->stokBahan }}" hidden>
                                                        @endforeach
                                                        <input type="text" class="" name="confirmed" value="1" hidden>
                                                        <input type="date" name="tanggalVerifikasi" id="date-picker" hidden>
                                                        <script>
                                                            var date = new Date();
                                                            var year = date.getFullYear();
                                                            var month = String(date.getMonth()+1).padStart(2,'0');
                                                            var todayDate = String(date.getDate()).padStart(2,'0');
                                                            var datePattern = year + '-' + month + '-' + todayDate;
                                                            document.getElementById("date-picker").value = datePattern;
                                                        </script>
                                                        <input type="" name="userVerifikasi" value="{{ auth()->user()->id }}" hidden>
                                                        <button class="btn btn-success rounded me-1" type="submit">ACC</button>
                                                    </form>
                                                    <!-- END FORM ACC PENGAJUAN LAYANAN -->

                                                    <!-- FORM TOLAK PENGAJUAN LAYANAN -->
                                                    <form action="/verifikasi/tolakpl/{{ $pl->id }}" method="post">
                                                        @csrf
                                                        <input type="text" class="" name="confirmed" value="2" hidden>
                                                        <input type="text" class="" name="id" value="{{ $pl->id }}" hidden>
                                                        <button class="btn btn-danger rounded me-1" type="submit">Tolak</button>
                                                    </form>
                                                    <!-- END FORM TOLAK PENGAJUAN LAYANAN -->

                                                    @endif
                                                    <button type="button" class="btn btn-secondary Close" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!-- END ACC DATA -->

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> 
            @endif  
            <!-- END SUBAG -->

        </div>
    </div>
</div>


@endsection
@extends('layout.main')

@section('content')



<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div  class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <a href="{{route('bahan.index')}}">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{asset('assetsz/img/bahan(1).png')}}" class="img-fluid rounded-start" alt="..." style="width: 100%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$as}}</h5>
                                        <p class="card-text">Bahan yang Tersedia</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4" style="text-align: right;">
                                <img src="{{asset('assetsz/img/pengujian1.png')}}" class="img-fluid rounded-start" alt="..." style="width: 75%;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$asw}}</h5>
                                    <p class="card-text">Parameter yang tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <!-- GRAFIK BAHAN -->
            <div id="chartColumn" class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Grafik Bahan</h4> 
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area wrapper" style="height: 300px; overflow-y: scroll hidden;overflow-x: scroll;width: 100%;display: flex;flex-direction: column-reverse;">
                    <div id="s-col" class="" style="width: 1000%;height: 100%;"></div>
                </div>
            </div>
            <!-- END GRAFIK BAHAN -->

        </div>

        <!-- DASHBOARD ANALIS -->
        @if(auth()->user()->role == "analis")
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="card shadow rounded" style="height: 100%;">

                <!-- CARD PENGAJUAN LAYANAN -->
                <div class="card-body" style="overflow-y: scroll;">
                    <div class="row" style="">
                        <h6 class="col-6" style="font-family: arial;">Pengajuan Layanan</h6>
                        <div class="col-6" style="text-align: right;">
                            <div class="dropdown custom-dropdown ">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(4, 0, 0, 1);transform: ;msFilter:;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                    <a class="dropdown-item" href="verifikasi/index">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @foreach($pengajuanLayanan as $pl)
                        @if($pl->userId == auth()->user()->id)
                            @if($pl->confirmed == 0)
                                <a href="#showDataLayanan{{ $pl->id }}" data-toggle="modal">
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                        <div class="col-6">{{ $pl->created_at->format('d/m/Y') }}</div>
                                        <div class="col-6">
                                            @if($pl->confirmed == 0)
                                                <span class="badge badge-danger">Belum di Confirm</span>
                                            @endif
                                        </div>
                                    </div>
                                </a>

                                <!-- MODAL SHOW DATA -->
                                <div class="modal fade" id="showDataLayanan{{ $pl->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <div class="table-responsifont-size:14px;                                     </tbody>
                                                        </table>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-seondary Close" data-dismiss="modal">Close</button>
                                            </div>          
                                        </div>
                                    </div>
                               </div>  
                                <!-- END SOW DATA -->
                            
                            @endif
                        @endif
                    @endforeach
                </div>
                <!-- END CARD PENGAJUAN LAYANAN -->
            </div>
        <div>
        <div id="chartLine" class="col-xl-12 layout-top-spacing ">
            <div class="statbox widget box box-shadow">
               <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4> Grafik Pengajuan Layanan Bulanan </h4> 
                        </div>
                    </div>
               </div>
                <div class="widget-content widget-content-area" style="height: 100%;">
                    <div>
                       <div id="sline"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- END DASHBOARD ANALIS -->

        <!-- DASHBOARD VERIFIKATOR -->
        @if(auth()->user()->role == "verifikator")
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 cl-12 layout-spacing">
            <div class="card shadow rounded" style="height: 100%;">
                <div class="card-body" styl="overflow-y: scroll;">
                    <div class="row" style="">
                        <h6 class="col-6" style="font-family: arial;">Pengajuan Layanan</h6>
                        <div class="col-6" style="text-align: right;">
                            <div class="dropdown custom-dropdown ">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(4, 0, 0, 1);transform: ;msFilter:;">
                                        <path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path>
                                    </svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                    <a class="dropdown-item" href="verifikasi/index">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                
                    @foreach($pengajuanLayanan as $pl)
                    @if($pl->confirmed == 0)
                    <a href="#accData{{ $pl->id }}" data-toggle="modal">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div class="col-6">{{ $pl->user->name }}</div>
                            <div class="col-6" style="text-align: right;opacity: 50%;">
                                <small>{{ $pl->created_at->format('d/m/Y') }}</small>
                            </div>
                        </div>
                    </a>

                    <!-- MODAL acc DATA -->
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
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">No</td>
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{ $loop->iteration }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">Nama</td>
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;"> : {{ $pl->user->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">Pengujian</td>    
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{$pl->layanan->pengujian->namaPengujian }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">Parameter</td>
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{ $pl->layanan->parameter }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">keterangan</td> 
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{ $pl->keterangan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">Tanggal Pengajuan</td> 
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{ $pl->created_at->format('d/m/Y') }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <br>
                                                        <br>
                
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3" bgcolor="#CCD6A6" style="color: black;" class="rounded">Bahan Yang dibutuhkan</th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="color: black;">No</th>
                                                                    <th style="color: black;">Nama Reagent</th>
                                                                    <th style="color: black;">Quantity</th>
                                                                </tr>
                                                            </thead>
                                                                <tbody style="font-weight: bold;">
                                                                @foreach( $pl->layanan->bahanLayanan as $bala )
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}.</td>
                                                                        <td>{{ $bala->bahan->namaReagent }}</td>
                                                                        <td>{{ $bala->stokBahan }}</td>
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
                                        <form action="/pengajuanLayanan/{{ $pl->id }}" method="post">
                                        @csrf
                                        @method('put')
                                            @foreach( $pl->layanan->bahanLayanan as $bala )
                                            <input type="text" class="" name="bahanId[]" value="{{ $bala->bahanId }}" hidden>
                                            <input type="text" class="" name="stokBahan[]" value="{{ $bala->stokBahan }}" hidden>
                                            @endforeach
                                            <input type="text" class="" name="confirmed" value="1" hidden>
                                            <button class="btn btn-success rounded me-1" type="submit">ACC</button>
                                        </form>
                                    @endif
                                    <button type="button" class="btn btn-secondary Close" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <!-- END ACC DATA --> 
                    @endif
                    @endforeach
                    </div>
                </div>
            </div>
        <div id="chartLine" class="col-xl-12 layout-top-spacing ">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4> Grafik Pengajuan Layanan Bulanan </h4> 
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: 100%;">
                    <div>
                        <div id="sline"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- END DASHBOARD VERIFIKATOR -->

        <!-- DASHBOARD KEPALA -->
        @if(auth()->user()->role == "kepala")
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="card text-white bg-white mb-3" style="height: 100%;">

                <!-- CARD PENGAJUAN BAHAN -->
                <div class="card-body" style="height: 50%;overflow-y: scroll;">
                    <div class="row">
                        <h6 class="col-6" style="font-family: arial;">Pengajuan Bahan</h6>
                        <div class="col-6" style="text-align: right;">
                            <div class="dropdown custom-dropdown ">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(4, 0, 0, 1);transform: ;msFilter:;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                    <a class="dropdown-item" href="verifikasi/index">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @foreach($bahanPengajuan as $bp)
                    @if($bp->confirmed == 0)
                    <a href="#accBahan{{ $pb->id }}" data-toggle="modal">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div class="col-6">{{ $bp->user->name }}</div>
                            <div class="col-6 text-muted" style="text-align: right;">
                                <small>{{ $bp->tanggalPengajuan }}</small>
                            </div>
                        </div>
                    </a>
                            
                    <!-- MODAL ACC DATA -->
                    <div class="modal fade" id="accBahan{{ $bp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUser">Detail Pengajuan Bahan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                        <tbody>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">No</td>
                                                <td>: {{ $loop->iteration }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">Nama</td>
                                                <td>: {{ $bp->user->name }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">Tanggal Pengajuan</td>
                                                <td>: {{ $bp->tanggalPengajuan }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">Bahan Yang Diajukan</td>
                                                <td>: {{ $bp->bahan->namaReagent }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">Quantity</td>
                                                <td>: {{ $bp->stokBahan }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">keterangan</td>
                                                <td>: {{ $bp->keterangan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">

                            @if($bp->confirmed == 0)

                            <!-- FORM ACC PENGAJUAN BAHAN -->
                            <form action="/pengajuanBahan/{{ $bp->id }}" method="post">
                                @method('put')
                                @csrf
                                <input type="text" class="" name="id" value="{{ $bp->id }}" hidden>
                                <input type="text" class="" name="bahanId[]" value="{{ $bp->bahanId }}" hidden>
                                <input type="text" class="" name="stokBahan[]" value="{{ $bp->stokBahan }}" hidden>
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
                                <input type="" name="userVerifikasi" value="{{ auth()->user()->id }}" hidden="">
                                <button class="btn btn-success rounded me-1" type="submit">ACC</button>
                            </form>
                            <!-- END FORM ACC PENGAJUAN BAHAN -->

                            <!-- FORM TOLAK PENGAJUAN BAHAN -->
                            <form action="/verifikasi/tolakpb/{{ $bp->id }}" method="post">
                                @csrf
                                <input type="text" class="" name="id" value="{{ $bp->id }}" hidden>
                                <input type="text" class="" name="confirmed" value="2" hidden>
                                <button class="btn btn-danger rounded me-1" type="submit">Tolak</button>
                            </form>
                            <!-- END FORM TOLAK PENGAJUAN BAHAN -->
                            @endif

                            <button type="button" class="btn btn-secondary Close" data-dismiss="modal">Close</button>
                        </div>                                                 
                        </div>
                    </div>
                    <!-- END ACC DATA -->
                    @endif
                    @endforeach
                </div>
                <!-- END CARD PENGAJUAN BAHAN -->

                <!-- CARD PENGAJUAN LAYANAN -->
                <div class="card-body" style="height: 50%;overflow-y: scroll;">
                    <div class="row" style="">
                        <h6 class="col-6" style="font-family: arial;">Pengajuan Layanan</h6>
                            <div class="col-6" style="text-align: right;">
                                <div class="dropdown custom-dropdown ">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(4, 0, 0, 1);transform: ;msFilter:;">
                                            <path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                        <a class="dropdown-item" href="verifikasi/index">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                
                        @foreach($pengajuanLayanan as $pl)
                        @if($pl->confirmed == 0)
                        <a href="#accData{{ $pl->id }}" data-toggle="modal">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <div class="col-6">{{ $pl->user->name }}</div>
                                <div class="col-6" style="text-align: right;opacity: 50%;">
                                    <small>{{ $pl->created_at->format('d/m/Y') }}</small>
                                </div>
                            </div>
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
                                        <div class="table-responsive">
                                            <table class="table align-middle">
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

                        @endif
                        @endforeach
                    </div>
                </div>
                <!-- END CARD PENGAJUAN LAYANAN -->

            </div>
        <div id="chartLine" class="col-xl-12 layout-top-spacing ">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4> Grafik Pengajuan Layanan Bulanan </h4> 
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: 100%;">
                    <div>
                        <div id="sline"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- END DASHBOARD KEPALA -->

        <!-- DASHBOARD SUBAG -->
        @if(auth()->user()->role == "subag")
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="card text-white bg-white mb-3" style="height: 100%;">

                <!-- CARD PENGAJUAN BAHAN -->
                <div class="card-body" style="height: 50%;overflow-y: scroll;">
                    <div class="row">
                        <h6 class="col-6" style="font-family: arial;">Pengajuan Bahan</h6>
                        <div class="col-6" style="text-align: right;">
                            <div class="dropdown custom-dropdown ">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(4, 0, 0, 1);transform: ;msFilter:;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                    <a class="dropdown-item" href="verifikasi/index">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @foreach($bahanPengajuan as $bp)
                    @if($bp->confirmed == 0)
                    <a href="#accBahan{{ $pb->id }}" data-toggle="modal">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div class="col-6">{{ $bp->user->name }}</div>
                            <div class="col-6 text-muted" style="text-align: right;">
                                <small>{{ $bp->tanggalPengajuan }}</small>
                            </div>
                        </div>
                    </a>
                            
                    <!-- MODAL ACC DATA -->
                    <div class="modal fade" id="accBahan{{ $bp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUser">Detail Pengajuan Bahan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                        <tbody>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">No</td>
                                                <td>: {{ $loop->iteration }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">Nama</td>
                                                <td>: {{ $bp->user->name }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">Tanggal Pengajuan</td>
                                                <td>: {{ $bp->tanggalPengajuan }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">Bahan Yang Diajukan</td>
                                                <td>: {{ $bp->bahan->namaReagent }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">Quantity</td>
                                                <td>: {{ $bp->stokBahan }}</td>
                                            </tr>
                                            <tr style="text-align: left;font-weight: bolder;font-size: 18px; border: none;">
                                                <td colspan="1">keterangan</td>
                                                <td>: {{ $bp->keterangan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">

                            @if($bp->confirmed == 0)

                            <!-- FORM ACC PENGAJUAN BAHAN -->
                            <form action="/pengajuanBahan/{{ $bp->id }}" method="post">
                                @method('put')
                                @csrf
                                <input type="text" class="" name="id" value="{{ $bp->id }}" hidden>
                                <input type="text" class="" name="bahanId[]" value="{{ $bp->bahanId }}" hidden>
                                <input type="text" class="" name="stokBahan[]" value="{{ $bp->stokBahan }}" hidden>
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
                                <input type="" name="userVerifikasi" value="{{ auth()->user()->id }}" hidden="">
                                <button class="btn btn-success rounded me-1" type="submit">ACC</button>
                            </form>
                            <!-- END FORM ACC PENGAJUAN BAHAN -->

                            <!-- FORM TOLAK PENGAJUAN BAHAN -->
                            <form action="/verifikasi/tolakpb/{{ $bp->id }}" method="post">
                                @csrf
                                <input type="text" class="" name="id" value="{{ $bp->id }}" hidden>
                                <input type="text" class="" name="confirmed" value="2" hidden>
                                <button class="btn btn-danger rounded me-1" type="submit">Tolak</button>
                            </form>
                            <!-- END FORM TOLAK PENGAJUAN BAHAN -->
                            @endif

                            <button type="button" class="btn btn-secondary Close" data-dismiss="modal">Close</button>
                        </div>                                                 
                        </div>
                    </div>
                    <!-- END ACC DATA -->
                    @endif
                    @endforeach
                </div>
                <!-- END CARD PENGAJUAN BAHAN -->

                <!-- CARD PENGAJUAN LAYANAN -->
                <div class="card-body" style="height: 50%;overflow-y: scroll;">
                    <div class="row" style="">
                        <h6 class="col-6" style="font-family: arial;">Pengajuan Layanan</h6>
                            <div class="col-6" style="text-align: right;">
                                <div class="dropdown custom-dropdown ">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(4, 0, 0, 1);transform: ;msFilter:;">
                                            <path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                        <a class="dropdown-item" href="verifikasi/index">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                
                        @foreach($pengajuanLayanan as $pl)
                        @if($pl->confirmed == 0)
                        <a href="#accData{{ $pl->id }}" data-toggle="modal">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <div class="col-6">{{ $pl->user->name }}</div>
                                <div class="col-6" style="text-align: right;opacity: 50%;">
                                    <small>{{ $pl->created_at->format('d/m/Y') }}</small>
                                </div>
                            </div>
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
                                        <div class="table-responsive">
                                                        <table class="table align-middle">
                                                            <thead>
                                                            </thead>
                                                            <tbody style="text-align: left;border: none;">
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">No</td>
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{ $loop->iteration }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">Nama</td>
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;"> : {{ $pl->user->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">Pengujian</td>    
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{$pl->layanan->pengujian->namaPengujian }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">Parameter</td>
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{ $pl->layanan->parameter }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">keterangan</td> 
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{ $pl->keterangan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" style="border: none;font-weight: bolder;font-size:14px;">Tanggal Pengajuan</td> 
                                                                    <td style="border: none;font-weight: bolder;font-size:14px;">: {{ $pl->created_at->format('d/m/Y') }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <br>
                                                        <br>
                
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3" bgcolor="#CCD6A6" style="color: black;" class="rounded">Bahan Yang dibutuhkan</th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="color: black;">No</th>
                                                                    <th style="color: black;">Nama Reagent</th>
                                                                    <th style="color: black;">Quantity</th>
                                                                </tr>
                                                            </thead>
                                                                <tbody style="font-weight: bold;">
                                                                @foreach( $pl->layanan->bahanLayanan as $bala )
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}.</td>
                                                                        <td>{{ $bala->bahan->namaReagent }}</td>
                                                                        <td>{{ $bala->stokBahan }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </table>
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

                        @endif
                        @endforeach
                    </div>
                </div>
                <!-- END CARD PENGAJUAN LAYANAN -->

            </div>
            <div id="chartLine" class="col-xl-12 layout-top-spacing ">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4> Grafik Pengajuan Layanan Bulanan </h4> 
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area" style="height: 100%;">
                        <div>
                            <div id="sline"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif    
            <!-- END DASHBOARD SUBAG -->


    </div>
</div>

<script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
<script type="text/javascript">
    var sCol = {
        chart: {
            height: 1000,
            type: 'bar',
            toolbar: {
            show: false,
        }
    },

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '50%',
        },
    },

    dataLabels: {
        enabled: false
    },

    stroke: {
        show: true,
        width: 1,
        colors: ['transparent']
    },

    series: [{
        name: 'stok yang tersedia',
        data: {!! json_encode($stok) !!}, //bisa di taro untuk memunculkan data
        }, {
            name: 'Bahan', //bisa di taro untuk memunculkan data
            }],
        xaxis: {
            /* memanggil function $kategori dari hasil perulangan pada controller format wajib ikuti seperti di bawah */
            categories: {!! json_encode($kategori) !!},
        },
        yaxis: {
            title: {
            text: 'Stok Bahan'
        }
    },

    fill: {
        opacity: 1
    },

            tooltip: {
                y: {
                formatter: function (val) {
                    return  val + " stok"
                }
            }
        }
    }

    //mengambil id pada div
    var chart = new ApexCharts(
    document.querySelector("#s-col"),
    sCol
    );

    chart.render();
</script>
<script type="text/javascript">
    var sline = {
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
            
            toolbar: {
                show: false,
            }
        },
        
        dataLabels: {
            enabled: false
        },

        stroke: {
            curve: 'straight'
        },

        series: [{
            name: "Pengajuan Layanan",
            data: JSON.parse('{!! json_encode($monthCount) !!}'),
        }],

        title: {
            text: ' by Month',
            align: 'left'
        },

        grid: {
            row: {
                colors: ['#f1f2f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: JSON.parse('{!! json_encode($month) !!}'),
        }
    }

var chart = new ApexCharts(
  document.querySelector("#sline"),
  sline

);

chart.render();
</script>


@endsection
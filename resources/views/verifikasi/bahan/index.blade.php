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
            <div class="widget-content widget-content-area br-6">
                <a href="/laporan/pdfPengajuanBahan" class="btn btn-success">
                    Export PDF
                </a>

                @if(auth()->user()->role == "verifikator")
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr style="background-color: #DAE2B6;">
                            <th style="border-radius: 10px 0px 0px 10px;color: #5F7161;">No</th>
                            <th style="color: #5F7161;">Nama Reagent</th>
                            <th style="color: #5F7161;">Quantity</th>
                            <th style="color: #5F7161;">Tanggal Pengajuan</th>
                            <th style="color: #5F7161;">Tanggal Verifikasi</th>
                            <th style="color: #5F7161;">Nama Verifikasi</th>
                            <th style="border-radius: 0px 10px 10px 0px;color: #5F7161;">Status</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($bahanPengajuan as $bp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bp->bahan->namaReagent }}</td>
                                <td>{{ $bp->stokBahan }}</td>
                                <td>{{ $bp->tanggalPengajuan }}</td>
                                <td>{{ $bp->tanggalVerifikasi }}</td>
                                <td>{{ $bp->userVerif->name }}</td>
                                <td>
                                    @if($bp->confirmed == 1)
                                        <span class="badge badge-success">Sudah di Confirm</span>
                                    @elseif($bp->confirmed == 2)
                                        <span class="badge badge-warning">Pengajuan Ditolak</span>
                                    @else
                                        <span class="badge badge-danger">Belum di Confirm</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                @endif

                @if(auth()->user()->role == "kepala")
                <table id="zero-config1" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr style="background-color: #DAE2B6;">
                            <th style="border-radius: 10px 0px 0px 10px;color: #5F7161;">No</th>
                            <th style="color: #5F7161;">Nama Reagent</th>
                            <th style="color: #5F7161;">Quantity</th>
                            <th style="color: #5F7161;">Tanggal Pengajuan</th>
                            <th style="color: #5F7161;">Tanggal Verifikasi</th>
                            <th style="color: #5F7161;">Nama Verifikasi</th>
                            <th style="color: #5F7161;">Status</th>
                            <th style="border-radius: 0px 10px 10px 0px;color: #5F7161;">Action</th>
                        </tr>
                    </thead>
                    <tbody style="border: none;">
                        @foreach($bahanPengajuan as $bp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bp->bahan->namaReagent }}</td>
                            <td>{{ $bp->stokBahan }}</td>
                            <td>{{ $bp->tanggalPengajuan }}</td>
                            <td>{{ $bp->tanggalVerifikasi }}</td>
                            <td>{{ $bp->userVerif->name }}</td>
                            <td>
                                @if($bp->confirmed == 1)
                                    <span class="badge badge-success">Sudah di Confirm</span>
                                @elseif($bp->confirmed == 2)
                                    <span class="badge badge-warning">Pengajuan Ditolak</span>
                                @else
                                    <span class="badge badge-danger">Belum di Confirm</span>
                                @endif
                            </td>                                              
                            <td>
                                <a href="#accBahan{{ $bp->id }}" data-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path></svg>
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
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">No</td>
                                                                <td>: {{ $loop->iteration }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">Nama</td>
                                                                <td>: {{ $bp->user->name }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">Tanggal Pengajuan</td>
                                                                <td>: {{ $bp->tanggalPengajuan }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">Bahan Yang Diajukan</td>
                                                                <td>: {{ $bp->bahan->namaReagent }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">Quantity</td>
                                                                <td>: {{ $bp->stokBahan }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
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

                                                <button type="button" class="btn btn-secondary Close" data-dismiss="modal">
                                                    Close
                                                </button>           
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
                @endif

                @if(auth()->user()->role == "subag")
                <table id="zero-config1" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr style="background-color: #DAE2B6;">
                            <th style="border-radius: 10px 0px 0px 10px;color: #5F7161;">No</th>
                            <th style="color: #5F7161;">Nama Reagent</th>
                            <th style="color: #5F7161;">Quantity</th>
                            <th style="color: #5F7161;">Tanggal Pengajuan</th>
                            <th style="color: #5F7161;">Tanggal Verifikasi</th>
                            <th style="color: #5F7161;">Nama Verifikasi</th>
                            <th style="color: #5F7161;">Status</th>
                            <th style="border-radius: 0px 10px 10px 0px;color: #5F7161;">Action</th>
                        </tr>
                    </thead>
                    <tbody style="border: none;">
                        @foreach($bahanPengajuan as $bp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bp->bahan->namaReagent }}</td>
                            <td>{{ $bp->stokBahan }}</td>
                            <td>{{ $bp->tanggalPengajuan }}</td>
                            <td>{{ $bp->tanggalVerifikasi }}</td>
                            <td>{{ $bp->userVerif->name }}</td>
                            <td>
                                @if($bp->confirmed == 1)
                                    <span class="badge badge-success">Sudah di Confirm</span>
                                @elseif($bp->confirmed == 2)
                                    <span class="badge badge-warning">Pengajuan Ditolak</span>
                                @else
                                    <span class="badge badge-danger">Belum di Confirm</span>
                                @endif
                            </td>                                              
                            <td>
                                <a href="#accBahan{{ $bp->id }}" data-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path></svg>
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
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">No</td>
                                                                <td>: {{ $loop->iteration }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">Nama</td>
                                                                <td>: {{ $bp->user->name }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">Tanggal Pengajuan</td>
                                                                <td>: {{ $bp->tanggalPengajuan }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">Bahan Yang Diajukan</td>
                                                                <td>: {{ $bp->bahan->namaReagent }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
                                                                <td colspan="1">Quantity</td>
                                                                <td>: {{ $bp->stokBahan }}</td>
                                                            </tr>
                                                            <tr style="text-align: left;font-weight: bolder;border: none;">
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

                                                <button type="button" class="btn btn-secondary Close" data-dismiss="modal">
                                                    Close
                                                </button>           
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
                @endif
            </div> 
        </div>
    </div>
</div>

@endsection
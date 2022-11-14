@extends('layout.main')

@section('content')

@include('sweetalert::alert')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-8  layout-spacing">
                
                <div>
                    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#modalTambahData">
                    <!-- <i class='bx bx-plus-medical'></i> -->
                        Tambah Data
                    </button>

                    <!-- MODAL TAMBAH DATA -->
                        <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahBarang" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('bahan.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput">Kode Bahan</label>
                                                <input value="{{ old('kodeBarang') }}" required name="kodeBarang" type="text" required class="form-control" id="floatingInput">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput2">Nama Barang</label>
                                                <input value="{{ old('namaReagent') }}" required name="namaReagent" type="text" required class="form-control" id="floatingInput2">
                                            </div>
                                           
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput4">Spesifikasi</label>
                                                <input value="{{ old('spesifikasi') }}" required name="spesifikasi" type="text" required class="form-control" id="floatingInput4">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput5">Stok Bahan</label>
                                                <input value="{{ old('stokBahan') }}" required name="stokBahan" type="number" required class="form-control" id="floatingInput5">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput6">Satuan</label>
                                                <input value="{{ old('satuan') }}" required name="satuan" type="text" required class="form-control" id="floatingInput6">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput5">Stok Minimum</label>
                                                <input value="{{ old('stokMinimum') }}" required name="stokMinimum" type="number" required class="form-control" id="floatingInput5">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput7">Harga Satuan</label>
                                                <input value="{{ old('hargaSatuan') }}" required name="hargaSatuan" type="number" required class="form-control" id="floatingInput7">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput8">Penyedia</label>
                                                <input value="{{ old('penyedia') }}" required name="penyedia" type="text" required class="form-control" id="floatingInput8">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput9">Tempat Penyimpanan</label>
                                                <input value="{{ old('tempatPenyimpanan') }}" required name="tempatPenyimpanan" type="text" required class="form-control" id="floatingInput9">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="floatingInput">Keterangan</label>
                                                <textarea class="form-control" required value="{{ old('keterangan') }}" name="keterangan" id="floatingTextarea2" style="height: 100px"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Foto</label>
                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                <input name="foto" class="form-control" type="file" id="image" name="image" onchange="previewImage()">       
                                            </div>
                                            <div class="input-group">
                                                <button class="btn btn-success rounded me-1" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END TAMBAH DATA -->

                    <a href="/laporan/pdfBahan" class="btn btn-success mb-1">Export PDF</a>

                </div>
                <div class="widget-content widget-content-area br-6">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Bahan</th>
                                <th>Nama Bahan</th>
                                <th>Stok Bahan</th>
                                <th>Satuan</th>
                                <th>Tempat Penyimpanan</th>
                                <th class="no-content">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bahans as $bahan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bahan->kodeBarang }}</td>
                                <td>{{ $bahan->namaReagent }}</td>
                                <td>{{ $bahan->stokBahan }}</td>
                                <td>{{ $bahan->satuan }}</td>
                                <td>{{ $bahan->tempatPenyimpanan }}</td>
                                <td>

                                    @if(auth()->user()->role == "kepala")
                                    <!-- EDIT DATA -->
                                    <a href="#modalEditData{{ $bahan->id }}" class="edit" data-toggle="modal">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <!-- END EDIT DATA -->
                                    <!-- MODAL EDIT DATA -->
                                    <div class="modal fade" id="modalEditData{{ $bahan->id }}" tabindex="-1" aria-labelledby="modalEditBarang" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/bahan/{{ $bahan->id }}" method="post" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Kode Bahan</label>
                                                            <input value="{{ old('kodeBarang', $bahan->kodeBarang) }}" required name="kodeBarang" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Nama Reagent</label>
                                                            <input value="{{ old('namaReagent', $bahan->namaReagent) }}" required name="namaReagent" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Spesifikasi</label>
                                                            <input value="{{ old('spesifikasi', $bahan->spesifikasi) }}" required name="spesifikasi" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Stok Bahan</label>
                                                            <input value="{{ old('stokBahan', $bahan->stokBahan) }}" required name="stokBahan" type="number" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Satuan</label>
                                                            <input value="{{ old('satuan', $bahan->satuan) }}" required name="satuan" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Stok Minimum</label>
                                                            <input value="{{ old('stokMinimum', $bahan->stokMinimum) }}" required name="stokMinimum" type="number" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Harga Satuan</label>
                                                            <input value="{{ old('hargaSatuan', $bahan->hargaSatuan) }}" required name="hargaSatuan" type="number" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Penyedia</label>
                                                            <input value="{{ old('penyedia', $bahan->penyedia) }}" required name="penyedia" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Tempat Penyimpanan</label>
                                                            <input value="{{ old('tempatPenyimpanan', $bahan->tempatPenyimpanan) }}" required name="tempatPenyimpanan" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingTextarea2">Keterangan</label>
                                                            <textarea class="form-control" required name="keterangan" required id="floatingTextarea2" style="height: 100px">{{ old('keterangan', $bahan->keterangan) }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Menu Photo</label>
                                                            @if ($bahan->foto)
                                                                <img src="{{ asset('storage/' . $bahan->foto) }}" class="img-preview img-fluid mb-3 col-sm-5">
                                                            @else                           
                                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                            @endif
                                                                <input name="foto" class="form-control" type="file" id="image" name="image" onchange="previewImages()">      
                                                        </div>
                                                        <div class="input-group">
                                                            <button class="btn btn-success rounded me-1" type="submit">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END EDIT DATA -->

                                    <!-- HAPUS DATA -->
                                    <form action="/bahan/{{ $bahan->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Sure?')" style="border: transparent;background-color: transparent;">
                                            <i class='bx bxs-trash'></i>
                                        </button>
                                    </form>
                                    <!-- END HAPUS DATA -->
                                    @endif

                                    @if(auth()->user()->role == "subag")
                                    <!-- EDIT DATA -->
                                    <a href="#modalEditData{{ $bahan->id }}" class="edit" data-toggle="modal">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <!-- END EDIT DATA -->
                                    <!-- MODAL EDIT DATA -->
                                    <div class="modal fade" id="modalEditData{{ $bahan->id }}" tabindex="-1" aria-labelledby="modalEditBarang" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/bahan/{{ $bahan->id }}" method="post" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Kode Bahan</label>
                                                            <input value="{{ old('kodeBarang', $bahan->kodeBarang) }}" required name="kodeBarang" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Nama Reagent</label>
                                                            <input value="{{ old('namaReagent', $bahan->namaReagent) }}" required name="namaReagent" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Spesifikasi</label>
                                                            <input value="{{ old('spesifikasi', $bahan->spesifikasi) }}" required name="spesifikasi" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Stok Bahan</label>
                                                            <input value="{{ old('stokBahan', $bahan->stokBahan) }}" required name="stokBahan" type="number" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Satuan</label>
                                                            <input value="{{ old('satuan', $bahan->satuan) }}" required name="satuan" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Stok Minimum</label>
                                                            <input value="{{ old('stokMinimum', $bahan->stokMinimum) }}" required name="stokMinimum" type="number" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Harga Satuan</label>
                                                            <input value="{{ old('hargaSatuan', $bahan->hargaSatuan) }}" required name="hargaSatuan" type="number" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Penyedia</label>
                                                            <input value="{{ old('penyedia', $bahan->penyedia) }}" required name="penyedia" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Tempat Penyimpanan</label>
                                                            <input value="{{ old('tempatPenyimpanan', $bahan->tempatPenyimpanan) }}" required name="tempatPenyimpanan" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingTextarea2">Keterangan</label>
                                                            <textarea class="form-control" required name="keterangan" required id="floatingTextarea2" style="height: 100px">{{ old('keterangan', $bahan->keterangan) }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Menu Photo</label>
                                                            @if ($bahan->foto)
                                                                <img src="{{ asset('storage/' . $bahan->foto) }}" class="img-preview img-fluid mb-3 col-sm-5">
                                                            @else                           
                                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                            @endif
                                                                <input name="foto" class="form-control" type="file" id="image" name="image" onchange="previewImages()">      
                                                        </div>
                                                        <div class="input-group">
                                                            <button class="btn btn-success rounded me-1" type="submit">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END EDIT DATA -->

                                    <!-- HAPUS DATA -->
                                    <form action="/bahan/{{ $bahan->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Sure?')" style="border: transparent;background-color: transparent;">
                                            <i class='bx bxs-trash'></i>
                                        </button>
                                    </form>
                                    <!-- END HAPUS DATA -->
                                    @endif


                                    <!-- SHOW DATA -->
                                    <a href="#detailData{{ $bahan->id }}" data-toggle="modal" style="text-align: center;">
                                        <i class='bx bxs-info-circle'></i>
                                    </a>
                                    <!-- END SHOW DATA -->
                                    <!-- MODAL SHOW DATA -->
                                    <div class="modal fade" id="detailData{{ $bahan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addUser">Detail Bahan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span>
                                                                    @if(!$bahan->foto)
                                                                <img width="100%" height="100%" alt="photo bahan" class="img-thumbnail img-fluid" src="{{ asset( "storage/images/defaultbahan.png" ) }}">
                                                                    @else 
                                                                <img width="100%" height="100%" alt="photo bahan" class="img-thumbnail img-fluid" src="{{ asset( "storage/". $bahan->foto ) }}">
                                                                    @endif
                                                            </span>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="table-responsive">
                                                                <table class="table align-middle">
                                                                    <thead>
                                                                        <tr></tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>No</td>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Kode Bahan</td>
                                                                            <td>{{ $bahan->kodeBarang }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama Bahan</td>
                                                                            <td>{{ $bahan->namaReagent }}</td>
                                                                        <tr>
                                                                            <td>Stok Bahan</td>
                                                                            <td>{{ $bahan->stokBahan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Satuan</td>
                                                                            <td>{{ $bahan->satuan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Stok Minimum</td>
                                                                            <td>{{ $bahan->stokMinimum }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Harga Satuan</td>
                                                                            <td>{{ $bahan->hargaSatuan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Penyedia</td>
                                                                            <td>{{ $bahan->penyedia }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tempat Penyimpanan</td>
                                                                            <td>{{ $bahan->tempatPenyimpanan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Keterangan</td>
                                                                            <td>{{ $bahan->keterangan }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>                              
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary Close" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 layout-spacing">
                <div class="card text-white bg-white mb-3" style="overflow-y: scroll; max-height: 100%;">
                    <div class="card-body">
                        <h6 class="card-title">Stok Bahan Hampir Habis</h6> 
                        <hr>
                        @foreach( $bahans as $bahan )
                        @if( $bahan->stokBahan <= $bahan->stokMinimum )
                        <div class="alert alert-warning mb-4 position-relative" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button> 
                            <strong>Warning!</strong> Barang <strong>{{ $bahan->namaReagent }}</strong> hampir habis (Stok Bahan = {{ $bahan->stokBahan }})
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
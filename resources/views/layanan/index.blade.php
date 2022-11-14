@extends('layout.main')

@section('content')


@include('sweetalert::alert')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div>
                    <!-- Tambah Data -->
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
                                    <form action="{{ route('layanan.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <label for="floatingInput1">Pengujian</label>
                                            <select name="pengujianId" class="form-control">
                                                <option>Select Pengujian</option>
                                                @foreach($pengujian as $p)
                                                <option value="{{ $p->id }}">{{ $p->namaPengujian }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="floatingInput3">Parameter</label>
                                            <input required name="parameter" type="text" required class="form-control" id="floatingInput3">
                                        </div>
                                        <div class="form-floating mb-3 bahan-container">
                                            <a type="" class=" btn-add-bahan" style="font-size: 14px;">
                                                <label class="details">Bahan yang dibutuhkan:</label>
                                                <i class='bx bx-plus-medical'></i>
                                            </a>
                                            <div class="input-group mb-1 bahan">
                                                <select name="bahanId[]" class="form-control">
                                                    <option><-- Select --></option>
                                                    @foreach ($bahan as $b)
                                                    <option value="{{ $b->id }}">{{ $b->namaReagent }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="number" name="stokBahan[]" class="form-control" placeholder="Qty" value="1">
                                                <a class="btn btn-secondary btn-delete-bahan" style="font-size: 18px;">
                                                    <i class='bx bxs-trash'></i>
                                                </a>
                                            </div>
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

                    <a href="/laporan/pdfLayanan" class="btn btn-success mb-1">Export PDF</a>

                </div>
                <div class="widget-content widget-content-area br-6">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengujian</th>
                                <th>Parameter</th>
                                <th class="dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($layanan as $l)
                            <tr>
                                <td>{{ $loop->iteration }}</td>                                
                                <td>{{ $l->pengujian->namaPengujian }}</td>
                                <td>{{ $l->parameter }}</td>
                                <td>
                                    
                                    <!-- EDIT DATA -->
                                    <a href="#modalEditData{{ $l->id }}" class="edit" data-toggle="modal">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <!-- END EDIT DATA -->
                                    <!-- MODAL UPDATE DATA -->
                                    <div class="modal fade" id="modalEditData{{ $l->id }}" tabindex="-1" aria-labelledby="modalEditBarang" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/layanan/{{ $l->id }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Pengujian</label>
                                                            <select name="pengujianId" class="form-control" >
                                                                @foreach ($pengujian as $p)
                                                                    @if ($l->pengujianId == $p->id)
                                                                        <option value="{{ $p->id }}" selected>{{ $p->namaPengujian }}</option>
                                                                    @else
                                                                        <option value="{{ $p->id }}">{{ $p->namaPengujian }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput">Parameter</label>
                                                            <input value="{{ old('parameter', $l->parameter) }}" required name="parameter" type="text" required class="form-control" id="floatingInput">
                                                        </div>
                                                        <div class="form-floating mb-3 bahan-container">
                                                            <a type="" class=" btn-add-bahan" style="font-size: 14px;">
                                                                <label class="details">Bahan yang dibutuhkan:</label>
                                                                <i class='bx bx-plus-medical'></i>
                                                            </a>
                                                            @foreach ($l->bahanLayanan as $key => $bahanLayanan)
                                                            <div class="input-group mb-1 bahan">
                                                                <select name="bahanId[]" class="form-control">
                                                                    <option></option>
                                                                    @foreach ($bahan as $b)
                                                                        @if ($bahanLayanan->bahanId == $b->id)
                                                                            <option value="{{ $b->id }}" selected>{{ $b->namaReagent }}</option>
                                                                        @else
                                                                            <option value="{{ $b->id }}">{{ $b->namaReagent }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <input type="number" name="stokBahan[]" class="form-control" value="{{ $bahanLayanan->stokBahan }}">
                                                                    @if ($key==0)
                                                                        <a class="btn-secondary">
                                                                            
                                                                        </a>
                                                                    @else
                                                                        <a class="btn btn-secondary btn-delete-bahan" style="font-size: 18px;">
                                                                            <i class='bx bxs-trash'></i>
                                                                        </a>
                                                                    @endif
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        
                                                        <div class="input-group">
                                                            <button class="btn btn-success rounded me-1" type="submit">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END UPDATE DATA -->


                                    <!-- HAPUS DATA -->
                                    <form action="/layanan/{{ $l->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Sure?')" style="border: transparent;background-color: transparent;">
                                            <i class='bx bxs-trash'></i>
                                        </button>
                                    </form>
                                    <!-- END HAPUS DATA -->


                                    <!-- SHOW DATA -->
                                    <a href="#detailData{{ $l->id }}" data-toggle="modal">
                                        <i class='bx bxs-info-circle'></i>
                                    </a>
                                    <!-- END SHOW DATA -->
                                    <!-- MODAL SHOW DATA -->
                                    <div class="modal fade" id="detailData{{ $l->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addUser">Detail Layanan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="container">
                                                            <div class="table-responsive">
                                                                <table class="table align-middle">
                                                                    <thead>
                                                                    </thead>
                                                                    <tbody style="font-weight: bold;">
                                                                        <tr class="fw-bold" style="border: none;">
                                                                            <td class="align-top" style="font-size: 18px;" colspan="1">No</td>
                                                                            <td style="font-size: 18px;">: {{ $loop->iteration }}</td>
                                                                        </tr>
                                                                        <tr style="border: none;">
                                                                            <td class="align-top" style="font-size: 18px;" colspan="1">Pengujian</td>
                                                                            <td style="font-size: 18px;">: {{ $l->pengujian->namaPengujian }}</td>
                                                                        </tr>
                                                                        <tr style="border: none;">
                                                                            <td style="font-size: 18px;" class="align-top" colspan="1">Parameter</td>
                                                                            <td style="font-size: 18px;">: {{ $l->parameter }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <br><br>
                                                                <span class="text">Bahan yang di butuhkan :</span>
                                                                <br>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-4 contextual-table">
                                                                        <thead>
                                                                            <tr class="">
                                                                                <th class="text-center">No</th>
                                                                                <th>Nama Bahan</th>
                                                                                <th>Quantity</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($l->BahanLayanan as $bl)
                                                                            <tr class="">
                                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                                <td>{{ $bl->bahan->namaReagent }}</td>
                                                                                <td>{{ $bl->stokBahan }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
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
                                    <!-- END SHOW DATA -->  

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script>
    $('.btn-add-bahan').click(function() {
        $('.bahan-container').append(bahan())
    })

    $(document).on('click', '.btn-delete-bahan', function() {
        $(this).closest('.bahan').remove()
    })

    function bahan() {
        return `<div class="input-group mb-1 bahan">
                    <select name="bahanId[]" class="form-control">
                        <option><-- Select --></option>
                        @foreach ($bahan as $b)
                        <option value="{{$b->id}}">{{$b->namaReagent}}</option>
                        @endforeach
                    </select>
                    <input type="number" name="stokBahan[]" class="form-control" value="1">
                          <a class="btn btn-secondary btn-delete-bahan" style="font-size: 18px;">
                            <i class='bx bxs-trash'></i>
                          </a>
                </div>`
        }
        
</script>
<script>

        // preview image
        function previewImages() {
            const image = document.querySelector("#image");
            const imgPreview = document.querySelector(".img-preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFEvent) {
                imgPreview.src = oFEvent.target.result;
            }
        }
</script>

@endsection
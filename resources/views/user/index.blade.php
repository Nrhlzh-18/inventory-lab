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
                                    <h5 class="modal-title" id="title">Create New User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('user.store') }}" id="addUser">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <label for="floatingInput2">Nama Lengkap</label>
                                            <input value="{{ old('name') }}" required name="name" type="text" required class="form-control" id="name">
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="floatingInput4">Email</label>
                                            <input value="{{ old('email') }}" required name="email" type="email" required class="form-control" id="email">
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="floatingInput5">Password</label>
                                            <input value="{{ old('password') }}" required name="password" type="password" required class="form-control" id="password">
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="floatingInput6">Role</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="kepala">Kepala</option>
                                                <option value="subag">Subag</option>
                                                <option value="verifikator">Verifikator</option>
                                                <option value="analis">Analis</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <button class="btn btn-success" onClick="store()">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TAMBAH DATA -->

                    <a href="/laporan/pdfUser" class="btn btn-success mb-1">Export PDF</a>

                </div>

                <div class="widget-content widget-content-area br-6">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $use) 
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $use->name }}</td>
                                <td>{{ $use->email }}</td>
                                <td>{{ $use->role }}</td>
                                <td style="font-size: 16px;">
                            
                                    <!-- EDIT DATA -->
                                    <a href="#modalEditData{{ $use->id }}" class="edit" data-toggle="modal">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <!-- END EDIT DATA -->
                                    <!-- EDIT Password -->
                                    <a href="#modalEditP{{ $use->id }}" class="edit" data-toggle="modal">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <!-- END EDIT Password -->

                                    <!-- MODAL EDIT DATA -->
                                    <div class="modal fade" id="modalEditData{{ $use->id }}" tabindex="-1" aria-labelledby="modalTambahBarang" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="titlee">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="/user/{{ $use->id }}" id="addUser">
                                                        @method('put')
                                                        @csrf
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput2">Nama Lengkap</label>
                                                            <input value="{{ old('name', $use->name ) }}" required name="name" type="text" required class="form-control" id="name">
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput4">Email</label>
                                                            <input value="{{ old('email', $use->email ) }}" required name="email" type="email" required class="form-control" id="email">
                                                        </div>
                                                        {{-- <div class="form-floating mb-3">
                                                            <label for="floatingInput5">Password</label>
                                                            <input value="{{ old('password') }}"  name="password" type="password"  class="form-control" id="password">
                                                        </div> --}}
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput6">Role</label>
                                                            <select name="role" id="role" class="form-control">
                                                                @if ($use->role == 'kepala')
                                                                    <option value="kepala" selected>kepala</option>
                                                                @else
                                                                    <option value="kepala">kepala</option>
                                                                @endif
                                                                @if ($use->role == 'subag')
                                                                    <option value="subag" selected>subag</option>
                                                                @else
                                                                    <option value="subag">subag</option>
                                                                @endif
                                                                @if ($use->role == 'verifikator')
                                                                    <option value="verifikator" selected>verifikator</option>
                                                                @else
                                                                    <option value="verifikator">verifikator</option>
                                                                @endif
                                                                @if ($use->role == 'analis')
                                                                    <option value="analis" selected>analis</option>
                                                                @else
                                                                    <option value="analis">analis</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                
                                                        <div class="input-group">
                                                            <button class="btn btn-success">Update</button>
                                                            {{-- <button class="btn btn-success rounded me-1" onclick="store()">Submit</button> --}}
                                                        </div>
                                                        </form>
                                                    {{-- <div class="" id="page"></div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TAMBAH DATA -->
                                    <!-- MODAL EDIT Password -->
                                    <div class="modal fade" id="modalEditP{{ $use->id }}" tabindex="-1" aria-labelledby="modalTambahBarang" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="titlee">Change Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="/user/{{ $use->id }}" id="addUser">
                                                        @method('put')
                                                        @csrf
                                                        <div class="form-floating mb-3">
                                                            <label for="floatingInput5">Password</label>
                                                            <input value=""  name="password" type="password"  class="form-control" id="password">
                                                        </div>
                                                        <div class="input-group">
                                                            <button class="btn btn-success">Update</button>
                                                            {{-- <button class="btn btn-success rounded me-1" onclick="store()">Submit</button> --}}
                                                        </div>
                                                        </form>
                                                    {{-- <div class="" id="page"></div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Edit Password -->


                                    <!-- HAPUS DATA -->
                                    <form action="/user/{{ $use->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Sure?')" style="border: transparent;background-color: transparent;">
                                            <i class='bx bxs-trash'></i>
                                        </button>
                                    </form>
                                    <!-- END HAPUS DATA -->
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

{{-- <script src="{{asset('assets/js/jquery.js')}}"></script>
<script>
    $(document).ready(function() {
        selesai();
    });

    function selesai(){
        setTimeout(function() {
            read();
            selesai();
        }, 0);
    }

    function read() {
            $.get("{{ url('read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
    }

    function reset() {
        $('#name').val('');
        $('#email').val('');
        $('#password').val('');
    }

    function create() {
        
            $("#title").html("Create New User");
            
            $("#modalTambahData").modal('show');
        
        
    }

    function store() {
        var data = $("#addUser").serialize();
        $.ajax({
            type: "POST",
            url: "{{ url('store') }}",
            data: data,

            success: function(data) {
                swal({
                    title: 'SUCCESS',
                    text: "Data User berhasil di tambah!",
                    type: 'success',
                    padding: '2em'
                })
                $(".close").click();
                reset();
                read()
            }
        });
    }

    function show(id) {
        $("#titlee").html("Edit User");
            
        $("#modalEditData"+id).modal('show');
    }

    </script> --}}
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>

{{-- <script type="text/javascript">
    $(document).ready(function() {
            $('#table').DataTable();
        } );
</script> --}}
@endsection
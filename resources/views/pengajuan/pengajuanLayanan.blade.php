@extends('layout.main')

@section('content')

@include('sweetalert::alert')


<div class="layout-px-spacing">
    <div class="row layout-top-spacing" style="justify-content: center;">
        <div class="asw">
            <div class="title">Pengajuan Layanan</div>
                <div class="content">
                    <form action="/pengajuanLayanan/store" method="POST">
                    @csrf
                        <div class="user-details tab">
                            <div style="display: none;">
                                <input type="" name="userId" value="{{ auth()->user()->id }}" >
                                <input type="date" name="tanggalPengajuan" id="date-picker">
                                <script>
                                    var date = new Date();
                                    var year = date.getFullYear();
                                    var month = String(date.getMonth()+1).padStart(2,'0');
                                    var todayDate = String(date.getDate()).padStart(2,'0');
                                    var datePattern = year + '-' + month + '-' + todayDate;
                                    document.getElementById("date-picker").value = datePattern;
                                </script>
                            </div>
                            <div class="form-floating mb-3">
                                <label class="form-label">Pengujian :</label>
                                <select name="pengujian" id="pengujian-dd" class="form-control input-lg layanan" data-dependent="parameter">
                                    <option>Select Pengujian</option>
                                    @foreach($pengujian as $p)
                                    <option value="{{ $p->id }}">{{ $p->namaPengujian }}</option>
                                    @endforeach
                                <select>
                                <br>
                            </div>
                            <div class="form-floating mb-3">
                                <label class="form-label">Parameter :</label>
                                <select name="layananId" id="parameter-dd" class="form-control input-lg">
                                    <option value="">Select Parameter</option>
                                </select>
                                <br>
                            </div>
                            <div class="form-floating mb-3" id="bahan-dd">

                            </div>
                            {{ csrf_field() }}
                            <div class="input-box">
                                <span class="details">Alasan</span>
                                <textarea required name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pengujian-dd').on('change', function () {
                var idpengujian = this.value;
                $("#parameter-dd").html('');
                $.ajax({
                    url: "{{url('pengajuanLayanan/fetch')}}",
                    type: "POST",
                    data: {
                        pengujianId: idpengujian,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#parameter-dd').html('<option value="">Select parameter</option>');
                        $.each(result.parameter, function (key, value) {
                            $("#parameter-dd").append('<option name="layananId" value="' + value
                                .id + '">' + value.parameter + '</option>');
                        });
                    }
                });
            });

            $('#parameter-dd').on('change', function () {
                var idLayanan = this.value;
                $("#bahan-dd").html('');
                $.ajax({
                    url: "{{url('pengajuanLayanan/fetch/bahan')}}",
                    type: "POST",
                    data: {
                        layananId: idLayanan,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $.each(res.bahan, function (key, value) {
                            $("#bahan-dd").html('<label class="form-label">Bahan Yang Dibutuhkan :</label><br><ul type="1"><li>' + value.bahanId + '</ul></li>');
                        });
                    }
                });
            });
        });

    </script>



@endsection

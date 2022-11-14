@extends('layout.main')

@section('content')

@include('sweetalert::alert')


<div class="layout-px-spacing">
    <div class="row layout-top-spacing" style="justify-content: center;">
        <div class="asw">
		    <div class="title">Pengajuan Bahan</div>
    	    <div class="content">
    		  	<form action="{{ route('pengajuanBahan.store') }}" method="POST">
          		@csrf
        	  		<div class="user-details">
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
      					<div class="form-floating mb-3 bahan-container">
              				<a type="" class=" btn-add-bahan" style="font-size: 14px;">
                				<label class="details">Bahan :</label>
                				<i class='bx bx-plus-medical'></i>
              				</a>
              				<div class="input-group mb-1 bahan">
               					<select name="bahanId[]" class="form-control" id="search">
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
                          						<select name="bahanId[]" class="form-control"  id="search">
                            						<option><-- Select --></option>
                              							@foreach ($bahan as $b)
                            						<option value="{{$b->id}}">{{$b->namaReagent}}</option>
                              							@endforeach
                          						</select>
                          						<input type="number" name="stokBahan[]" class="form-control" placeholder="Qty" value="1">
                          						<a class="btn btn-secondary btn-delete-bahan" style="font-size: 18px;">
                            						<i class='bx bxs-trash'></i>
                          						</a>
                        					</div>`
              					}

            				</script>
            			</div>
      	    			<div class="input-box">
      		    			<span class="details">Alasan</span>
      			  			<textarea required name="keterangan"></textarea>
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


@endsection
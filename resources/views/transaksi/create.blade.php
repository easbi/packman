@extends('layout.main')
@section('content')

<div class="container">
	<center><h2>Tambah Paket Baru</h2><br/></center>
	<form method="post" action="{{url('transaksis')}}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Nama Penerima:</label>
			<input type="text" class="form-control" name="nama_penerima" id="nama_penerima">
			<div id="countryList">
			</div>
		</div>
		<div class="form-group">
			<label for="jenis_diklat">Kategori Penerima Paket :</label>
			<select class="form-control" name="jenis_diklat">
				<option value="" selected disabled>Pilih</option>
				@foreach($jenis_penerima as $key => $jenis_penerima)
				<option value="{{$key}}">{{$jenis_penerima}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="kategori">Kategori Paket:</label>
			<select class="form-control" name="kategori">
				<option value="" selected disabled>Pilih</option>
				@foreach($kategori as $key => $kt)
				<option value="{{$key}}">{{$kt}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="jasa_pengirim">Jasa Pengirim :</label>
			<select class="form-control" name="jasa_pengirim">
				<option value="" selected disabled>Pilih</option>
				@foreach($jasa_pengirim as $key => $jp)
				<option value="{{$key}}">{{$jp}}</option>
				@endforeach
			</select>
		</select>
	</div>
	<div class="form-group">
		<label for="status">Status :</label>
		<select class="form-control" name="status">
			<option value="" selected disabled>Pilih</option>
			@foreach($nama_status as $key => $ns)
			<option value="{{$key}}">{{$ns}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="penerima">Penerima Paket di Pos:</label>
		<select class="form-control" name="penerima">
			<option value="" selected disabled>Pilih</option>
			@foreach($nama_petugas as $key => $petugas)
			<option value="{{$key}}">{{$petugas}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Submit</button>
	</div>
</form>
</div>

<script>
$(document).ready(function(){

 $('#nama_penerima').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();  
                    $('#countryList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#nama_penerima').val($(this).text());  
        $('#countryList').fadeOut();  
    });  

});
</script>

@endsection
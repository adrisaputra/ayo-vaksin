@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __('SETTING') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('SETTING') }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Setting</h3>
		</div>
		
		<form action="{{ url('/setting/edit/'.$setting->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group @if ($errors->has('nama')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Nama') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('nama'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('nama') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama" name="nama" value="{{ $setting->nama }}" disabled>
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('jumlah')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Jumlah') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('jumlah'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('jumlah') }}</label>@endif
							<input type="text" class="form-control" placeholder="Jumlah" name="jumlah" value="{{ $setting->jumlah }}">
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<div>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
								<a href="{{ url('/setting') }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
	</section>
</div>

<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>

@endsection
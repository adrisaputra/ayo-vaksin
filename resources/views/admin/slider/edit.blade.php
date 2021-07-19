@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __('SLIDER') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('SLIDER') }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Slider</h3>
		</div>
		
		<form action="{{ url('/slider/edit/'.$slider->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
				<div class="form-group @if ($errors->has('judul')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Judul') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('judul'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('judul') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama Slider" name="judul" value="{{ $slider->judul }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('isi')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Isi') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('isi'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('isi') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama Slider" name="isi" value="{{ $slider->isi }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('isi')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Gambar') }}</label>
						<div class="col-sm-10">
							<i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb</i><br>
							@if ($errors->has('isi'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('gambar') }}</label>@endif
							<input type="file" class="form-control" name="gambar" >
							<br><br>
							@if($slider->gambar)
								<img src="{{ url('/upload/slider/'.$slider->gambar) }}" width="150px" height="100px">
							@endif
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<div>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
								<a href="{{ url('/slider') }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
	</section>
</div>

@endsection
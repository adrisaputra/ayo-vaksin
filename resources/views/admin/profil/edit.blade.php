@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __('PROFIL') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('PROFIL') }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Profil</h3>
		</div>
		
		<form action="{{ url('/profil/edit/'.$profil->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group @if ($errors->has('nama_dinas')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Nama Dinas') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('nama_dinas'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('nama_dinas') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama Dinas" name="nama_dinas" value="{{ $profil->nama_dinas }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('alamat')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Alamat') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('alamat'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('alamat') }}</label>@endif
							<input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ $profil->alamat }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('telp')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Facebook') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('telp'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('telp') }}</label>@endif
							<input type="text" class="form-control" placeholder="Telepon" name="telp" value="{{ $profil->telp }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('email')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Instagram') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('email'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>@endif
							<input type="text" class="form-control" placeholder="Email" name="email" value="{{ $profil->email }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<div>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
								<a href="{{ url('/profil') }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
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
@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __('FASKES') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('FASKES') }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Faskes</h3>
		</div>
		
		<form action="{{ url('/faskes/edit/'.$faskes->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
				<div class="form-group @if ($errors->has('nama_faskes')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Nama Faskes') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('nama_faskes'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('nama_faskes') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama Faskes" name="nama_faskes" value="{{ $faskes->nama_faskes }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('status')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Status') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('status'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('status') }}</label>@endif
							<select class="form-control" name="status">
								<option value="">- Pilih Status-</option>
								<option value="0" @if($faskes->status=="0") selected @endif>Tidak Aktif</option>
								<option value="1" @if($faskes->status=="1") selected @endif>Aktif</option>
							</select>

						</div>
					</div>
					
					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<div>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
								<a href="{{ url('/faskes') }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
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
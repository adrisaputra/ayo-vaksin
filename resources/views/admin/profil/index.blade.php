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
			
			<div class="table-responsive box-body">

				@if ($message = Session::get('status'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i>Berhasil !</h4>
						{{ $message }}
					</div>
				@endif

				<table class="table table-bordered">
					<tr style="background-color: gray;color:white">
						<th style="width:1px">No</th>
						<th style="width:30%;">Nama Dinas</th>
						<th style="width:30%;">Alamat</th>
						<th style="width:15%;">Facebook</th>
						<th style="width:15%;">Instagram</th>
						<th style="width:10%;">Aksi</th>
					</tr>
					@foreach($profil as $v)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $v->nama_dinas }}</td>
						<td>{{ $v->alamat }}</td>
						<td>{{ $v->telp }}</td>
						<td>{{ $v->email }}</td>
						<td>
							<a href="{{ url('/profil/edit/'.$v->id ) }}" class="btn btn-xs btn-flat btn-warning">Edit</a>
						</td>
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $profil->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection
@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">{{ __('ANTRIAN') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('ANTRIAN') }}</a></li>
	</ol>
	</section>
	
	<section class="content">
	<div class="box">   
		<div class="box-header with-border">
			<div class="box-tools pull-left">
				<div style="padding-top:10px">
					<a href="{{ url('/antrian') }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
				</div>
			</div>
			<div class="box-tools pull-right">
				<div class="form-inline">
					<form action="{{ url('/antrian/search') }}" method="GET">
						<input type="text" class="form-control datepicker" placeholder="Tanggal" name="tanggal" value="@if(Request::get('tanggal')) {{ Request::get('tanggal') }} @else {{ date('Y-m-d') }} @endif">
						<div class="input-group margin">
							<input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-danger btn-flat">cari</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
			
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
						<th width="50px">No Urut</th>
						<th width="160px">Nama</th>
						<th width="50px">Tanggal Vaksin</th>
						<th width="50px">Vaksin Ke</th>
						<th width="50px">Status</th>
						@if(Auth::user()->group==1)
							<th width="50px">Faskes</th>
						@endif
						<th width="100px">Aksi</th>
					</tr>
					@foreach($antrian as $v)
					<tr>
						<td>{{ $v->no_urut }}</td>
						<td>{{ $v->nama }}</td>
						<td>{{ date('d-m-Y', strtotime($v->tanggal)) }}</td>
						<td>
							@if($v->vaksin_ke==1)
								Vaksin 1
							@elseif($v->vaksin_ke==3)
								Vaksin 1
							@elseif($v->vaksin_ke==2)
								Vaksin 2
							@endif
						</td>
						<td>
						@if($v->status==0)
							<span class="label label-warning">Masih Dalam Antrian</span>
						@elseif($v->status==1)
							<span class="label label-success" style="background-color: #00a65a !important;">Hadir</span>
						@elseif($v->status==2)
							<span class="label label-danger" style="background-color: #dd4b39 !important;">Tidak Hadir</span>
						@elseif($v->status==3)
							<span class="label label-primary">Ditolak</span><br><br>

							<b>Alasan :</b> {{ $v->alasan }}
						@endif
						</td>
						@if(Auth::user()->group==1)
							<th width="100px">{{ $v->nama_faskes }}</th>
						@endif
						<td>
							<a href="{{ url('/antrian/edit/'.$v->id) }}" class="btn btn-xs btn-primary btn-flat btn-block">Lihat Data<i class="icofont-download"></i></a>
							<!-- <a href="{{ url('/antrian/hapus/'.$v->id ) }}" class="btn btn-xs btn-flat btn-danger btn-block"" onclick="return confirm('Anda Yakin ?');">Hapus</a> -->
						</td>
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $antrian->appends(Request::only('tanggal','search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection
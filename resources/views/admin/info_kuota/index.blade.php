@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">{{ __('INFO KUOTA') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('INFO KUOTA') }}</a></li>
	</ol>
	</section>
	
	<section class="content">
	<div class="box">   
		<div class="box-header with-border">
			<div class="box-tools pull-left">
				<div style="padding-top:10px">
					<a href="{{ url('/info_kuota') }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
				</div>
			</div>
			
		</div>
		
		<center><p style="font-size:20px">{{ __('INFO KUOTA FASKES TANGGAL') }} {{ date('d-m-Y')}}</p></center>
			<div class="table-responsive box-body">

				<table class="table table-bordered">
					<tr style="background-color: gray;color:white">
						<th width="50px">No</th>
						<th width="50px">Nama Faskes</th>
						<th width="50px">Kuota</th>
						<th width="50px">Belum Registrasi</th>
						<th width="50px">Hadir</th>
						<th width="50px">Tidak Hadir</th>
						<th width="50px">Di Tolak</th>
					</tr>
					@foreach($info_kuota as $v)
					<tr>
						<td>{{ $v->no_urut }}</td>
						<td>{{ $v->nama_faskes }}</td>
						<td>{{ $v->jumlah_antrian }}</td>
						@php
							$belum_registrasi = DB::table('antrian_tbl')->where('tanggal',date('Y-m-d'))->where('status', 0)->where('faskes', $v->faskes)->count();
							$hadir = DB::table('antrian_tbl')->where('tanggal',date('Y-m-d'))->where('status', 1)->where('faskes', $v->faskes)->count();
							$tidak_hadir = DB::table('antrian_tbl')->where('tanggal',date('Y-m-d'))->where('status', 2)->where('faskes', $v->faskes)->count();
							$di_tolak = DB::table('antrian_tbl')->where('tanggal',date('Y-m-d'))->where('status', 3)->where('faskes', $v->faskes)->count();
						@endphp
						
						<td>{{ $belum_registrasi }}</td>
						<td>{{ $hadir }}</td>
						<td>{{ $tidak_hadir }}</td>
						<td>{{ $di_tolak }}</td>
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $info_kuota->appends(Request::only('tanggal','search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection
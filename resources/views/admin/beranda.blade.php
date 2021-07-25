@extends('admin/layout')
@section('konten')

<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">
		
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
	</ol>
	</ol>
	</section>
	
	<section class="content">
	
	<div class="box-body">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-4 col-xs-6">
				<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
						<h3>{{ $jumlah_antrian }}</h3>

						<p>Jumlah Antrian Hari Ini</p>
						</div>
						<div class="icon">
						<i class="fa fa-inbox"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
						<h3>{{ $sudah_divaksin }}</h3>

						<p>Sudah Registrasi</p>
						</div>
						<div class="icon">
						<i class="fa fa-inbox"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
						<h3>{{ $belum_divaksin }}</h3>

						<p>Belum Registrasi</p>
						</div>
						<div class="icon">
						<i class="fa fa-inbox"></i>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
	</section>
</div>
@endsection
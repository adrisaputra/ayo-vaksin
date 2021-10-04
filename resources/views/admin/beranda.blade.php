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
				@if(Auth::user()->group==1)
					<div class="col-lg-3 col-xs-6">
					<!-- small box -->
						<div class="small-box bg-primary">
							<div class="inner">
							<h3>{{ number_format($total_keseluruhan,0,",",".") }}</h3>

							<p>Total Keseluruhan Yang Hadir</p>
							</div>
							<div class="icon">
							<i class="fa fa-inbox"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-xs-6">
					<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
							<h3>{{ number_format($jumlah_antrian,0,",",".") }}</h3>

							<p>Jumlah Antrian Hari Ini</p>
							</div>
							<div class="icon">
							<i class="fa fa-inbox"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
							<h3>{{ number_format($sudah_divaksin,0,",",".") }}</h3>

							<p>Sudah Registrasi</p>
							</div>
							<div class="icon">
							<i class="fa fa-inbox"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
							<h3>{{ number_format($belum_divaksin,0,",",".") }}</h3>

							<p>Belum Registrasi</p>
							</div>
							<div class="icon">
							<i class="fa fa-inbox"></i>
							</div>
						</div>
					</div>
				@else
					<div class="col-lg-4 col-xs-6">
					<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
							<h3>{{ number_format($jumlah_antrian,0,",",".") }}</h3>

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
							<h3>{{ number_format($sudah_divaksin,0,",",".") }}</h3>

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
							<h3>{{ number_format($belum_divaksin,0,",",".") }}</h3>

							<p>Belum Registrasi</p>
							</div>
							<div class="icon">
							<i class="fa fa-inbox"></i>
							</div>
						</div>
					</div>
				@endif
				
			</div>
			<!-- /.row -->
	</section>
</div>
@endsection
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
			<h3 class="box-title">Proses Antrian</h3>
		</div>
		
		<form action="{{ url('/antrian/edit/'.$antrian->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('NIK') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->nik }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Nama Lengkap') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->nama }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Tempat Lahir') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->tempat_lahir }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Tanggal Lahir') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($antrian->tanggal_lahir)) }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Alamat Sesuai KTP & Domisili') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->alamat }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Pekerjaan') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->pekerjaan }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Instansi / Tempat Kerja') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->tempat_kerja }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('No. HP') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->no_hp }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Vaksin Ke') }}</label>
						<div class="col-sm-10">
						@if($antrian->vaksin_ke == 1)
							<input type="text" class="form-control" value="{{ __('Pertama') }}" disabled>
						@elseif($antrian->vaksin_ke == 2)
							<input type="text" class="form-control" value="{{ __('Kedua') }}" disabled>
						@else
							<input type="text" class="form-control" value="{{ __('Pertama (Lansia)') }}" disabled>
						@endif
						</div>
					</div>

					<!-- @if($antrian->vaksin_ke == 1)
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Tujuan') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->tujuan }}" disabled>
						</div>
					</div>
					
					@endif -->

					@if($antrian->vaksin_ke == 2)
					
					<hr>
              			<center>DATA VAKSIN PERTAMA</center>

					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('No. Tiket') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->no_tiket }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Tanggal Vaksin Pertama') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($antrian->tanggal_vaksin_pertama)) }}" disabled>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Faskes') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $antrian->faskes_vaksin_pertama }}" disabled>
						</div>
					</div>
					
					@endif
					
					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<div>
									<button type="submit" class="btn btn-success btn-flat btn-sm" title="Proses Data" onclick="return confirm('Anda Yakin ?');" name="status" value="hadir"> Hadir</button>
									<button type="submit" class="btn btn-danger btn-flat btn-sm" title="Proses Data" onclick="return confirm('Anda Yakin ?');" name="status" value="tidak_hadir"> Tidak Hadir</button>
									<button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-default"> Di Tolak</button>

									<div class="modal fade" id="modal-default">
										<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Alasan Di Tolak</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label class="col-sm-2 control-label">{{ __('Alasan') }}</label>
												<div class="col-sm-10">
													<textarea class="form-control" name="alasan"></textarea>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
										</div>
										<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->

								<br><br>
								<a href="{{ url('/antrian') }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
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
@extends('web/layout')
@section('content')



<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="padding: 27px 0;">
      <div class="container" style="width: 70%;">

        <div class="d-flex justify-content-between align-items-center" style="margin-top: 65px;">
          <h2>{{ $title }}</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>{{ $title }}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" >
        <center><h2>{{ $title }}</h2></center>
        
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            
            @if ($message = Session::get('status'))
						<p class="alert text-center" style="color: #ffffff;background-color: #4caf50;border-color: #d6e9c6;">
							{{ $message }}
						</p>
						@endif
						
            @if ($message = Session::get('status2'))
						<p class="alert text-center" style="color: #ffffff;background-color: #dd4b39;border-color: #d6e9c6;">
							{{ $message }}
						</p>
						@endif
						
            @if ($message = Session::get('status3'))
						<p class="alert text-center" style="color: #ffffff;background-color: #f39c12;border-color: #e08e0b;">
							{{ $message }}. Silakan Cetak Ulang Tiket <a href="{{ url('/antrian_w')}}"><b style="color:#3f51b5">DISINI</b></a> !!!
						</p>
						@endif
						
            <form action="{{ url('/antrian_w')}}" method="POST" enctype="multipart/form-data">
            
            {{ csrf_field() }}
						
              
              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Faskes</p>
                </div>
                <div class="col-md-9 form-group">
                  <select name="faskes" class="form-control">
                    <option value="">- Pilih Faskes-</option>
                    @foreach($faskes as $v)
                          <option value="{{ $v->id }}" @if(old('faskes')=="$v->id") selected @endif>{{ $v->nama_faskes }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('faskes_vaksin_pertama')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('faskes_vaksin_pertama') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>NIK</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="nik" class="form-control" value="{{ old('nik') }}">
                  @if ($errors->has('nik')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('nik') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Nama Lengkap</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                  @if ($errors->has('nama')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('nama') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Tempat Lahir</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
                  @if ($errors->has('tempat_lahir')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('tempat_lahir') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Tanggal Lahir</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tanggal_lahir" class="date form-control" value="{{ old('tanggal_lahir') }}" readonly='true' style="background-color: #fff;">
                  @if ($errors->has('tanggal_lahir')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('tanggal_lahir') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Alamat Sesuai KTP</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
                  @if ($errors->has('alamat')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('alamat') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Alamat Domisili</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="domisili" class="form-control" value="{{ old('domisili') }}">
                  @if ($errors->has('domisili')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('domisili') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Pekerjaan</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}">
                  @if ($errors->has('pekerjaan')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('pekerjaan') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Instansi / Tempat Kerja</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tempat_kerja" class="form-control"  value="{{ old('tempat_kerja') }}">
                  @if ($errors->has('tempat_kerja')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('tempat_kerja') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>No. HP</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                  @if ($errors->has('no_hp')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('no_hp') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Vaksin Ke</p>
                </div>
                <div class="col-md-9 form-group">
                  <select name="vaksin_ke" class="form-control" onChange="if (this.selectedIndex=='1'){ 
 												document.getElementById('vaksin1').style.display = 'none'; 
 												document.getElementById('vaksin2').style.display = 'none'; 
 											} else if (this.selectedIndex=='2'){
                        document.getElementById('vaksin1').style.display = 'none'; 
                        document.getElementById('vaksin2').style.display = 'inline'; 
                      }
 											">
                    <option  value="">- Pilih -</option>
                    <option value="1" @if(old('vaksin_ke')=="1") selected @endif>Pertama</option>
                    <!-- <option value="3" @if(old('vaksin_ke')=="3") selected @endif>Pertama (Lansia)</option> -->
                    <option value="2" @if(old('vaksin_ke')=="2") selected @endif>Kedua</option>
                  </select>
                  @if ($errors->has('vaksin_ke')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('vaksin_ke') }}</label>@endif
                </div>
              </div>

              @if(old('vaksin_ke')==1)
                  <span id='vaksin1' style='display:inline;'>
              @else
                  <span id='vaksin1' style='display:none;'>
              @endif
              
              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Tujuan</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tujuan" class="form-control" value="{{ old('tujuan') }}">
                  @if ($errors->has('tujuan')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('tujuan') }}</label>@endif
                </div>
              </div>

              </span>

              @if(old('vaksin_ke')==2)
                  <span id='vaksin2' style='display:inline;'>
              @else
                  <span id='vaksin2' style='display:none;'>
              @endif

              <hr>
              <center>DATA VAKSIN PERTAMA</center>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>No. Tiket</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="no_tiket" class="form-control" value="{{ old('no_tiket') }}">
                  @if ($errors->has('no_tiket')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('no_tiket') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Tanggal Vaksin Pertama</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tanggal_vaksin_pertama" class="date2 form-control" value="{{ old('tanggal_vaksin_pertama') }}"  readonly='true' style="background-color: #fff;">
                  @if ($errors->has('tanggal_vaksin_pertama')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('tanggal_vaksin_pertama') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Faskes Vaksin Pertama</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="faskes_vaksin_pertama" class="form-control" value="{{ old('faskes_vaksin_pertama') }}">
                  @if ($errors->has('faskes_vaksin_pertama')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('faskes_vaksin_pertama') }}</label>@endif
                </div>
              </div>

              </span>
              <br>
              <div class="text-center"><button type="submit" class="btn btn-success" style="background: #00a65a;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 4px;">Registrasi</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<script type="text/javascript">

    $('.date').datepicker({  

       format: 'yyyy-mm-dd',
       autoclose: true

     }); 
    $('.date2').datepicker({  

       format: 'yyyy-mm-dd',
       autoclose: true

     });  

</script> 
@endsection
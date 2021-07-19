@extends('web/layout')
@section('content')
       
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container" style="width: 70%;">

        <div class="d-flex justify-content-between align-items-center">
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
        <center><h2>Akun</h2></center>
        
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            
            <form method="POST" action="{{ url('akun_w/edit/'.$user[0]->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
            @if ($message = Session::get('status'))
            <div class="col-md-8 offset-2 form-group">
              <p class="alert text-center" style="color: #ffffff;background-color: #d41e10;border-color: #f44336;">
                {{ $message }}
              </p>
            </div>
						@endif
						
              <div class="row">
                <div class="col-md-3 offset-2 form-group">
                  <p style="margin-top:6px">Nama User</p>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" class="form-control" placeholder="Nama User" value="{{ $user[0]->name }}" disabled>
                  @if ($errors->has('name')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('name') }}</label>@endif
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <div class="col-md-3 offset-2 form-group">
                  <p style="margin-top:6px">Email</p>
                </div>
                <div class="col-md-5 form-group">
                  <input type="email" class="form-control" placeholder="Email" value="{{ $user[0]->email }}" disabled>
                  @if ($errors->has('email')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('email') }}</label>@endif
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <div class="col-md-3 offset-2 form-group">
                  <p style="margin-top:6px">NIK</p>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" class="form-control" placeholder="NIK" value="{{ $user[0]->nik }}" disabled>
                  @if ($errors->has('nik')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('nik') }}</label>@endif
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <div class="col-md-3 offset-2 form-group">
                  <p style="margin-top:6px">Alamat</p>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $user[0]->alamat }}">
                  @if ($errors->has('alamat')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('alamat') }}</label>@endif
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <div class="col-md-3 offset-2 form-group">
                  <p style="margin-top:6px">No. HP</p>
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="no_hp" class="form-control" placeholder="No. HP" value="{{ $user[0]->no_hp }}">
                  @if ($errors->has('no_hp')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('no_hp') }}</label>@endif
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <div class="col-md-3 offset-2 form-group">
                  <p style="margin-top:6px">Foto KTP</p>
                </div>
                <div class="col-md-5 form-group">
                  <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 300 Kb (jpg,jpeg,png)</i><br>
                  <input type="file" name="foto_ktp" class="form-control" placeholder="Foto KTP">
                  @if ($errors->has('foto_ktp')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('foto_ktp') }}</label>@endif
                  <br>
                  @if($user[0]->foto_ktp)
                    <img src="{{ url('/upload/foto_ktp/'.$user[0]->foto_ktp) }}" width="150px" height="100px">
                  @endif
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <div class="col-md-3  offset-2  form-group">
                  <p style="margin-top:6px">Password</p>
                </div>
                <div class="col-md-5 form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  @if ($errors->has('password')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('password') }}</label>@endif
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <div class="col-md-3  offset-2  form-group">
                 <p style="margin-top:6px">Konfirmasi Password</p>
                </div>
                <div class="col-md-5 form-group">
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                  @if ($errors->has('password_confirmation')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('password_confirmation') }}</label>@endif
                </div>
              </div>
              <br>
              <div class="text-center"><button type="submit" class="btn btn-success" style="background: #d41e10;
                border: 0;
                padding: 10px 24px;
                color: #fff;
                transition: 0.4s;
                border-radius: 4px;">Simpan Data</button>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
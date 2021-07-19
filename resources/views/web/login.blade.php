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
        <center><h2>Login</h2></center>
        
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            
            <form method="POST" action="{{ url('login_w') }}" method="POST" enctype="multipart/form-data">
                @csrf
						
            @if ($message = Session::get('status'))
            <div class="col-md-8 offset-2 form-group">
						  <p class="alert text-center" style="color: #ffffff;background-color: #4caf50;border-color: #d6e9c6;">
                {{ $message }}
              </p>
            </div>
						@endif
						
              <div class="row">
                <div class="col-md-3 offset-2 form-group">
                  Nama User
                </div>
                <div class="col-md-5 form-group">
                  <input type="text" name="name" class="form-control">
                </div>
              </div>
              <div class="row" style="margin-top:10px">
                <div class="col-md-3  offset-2  form-group">
                  Password
                </div>
                <div class="col-md-5 form-group">
                  <input type="password" name="password" class="form-control">
                </div>
              </div>
              <br>
              <div class="text-center"><button type="submit" class="btn btn-success" style="background: #d41e10;
                border: 0;
                padding: 10px 24px;
                color: #fff;
                transition: 0.4s;
                border-radius: 4px;">Login</button>
                <br><br>
                Belum Punya Akun ? Registrasi <a href="{{ url('registrasi_w') }}">Di Sini !</a>
                </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
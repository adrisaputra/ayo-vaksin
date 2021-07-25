@extends('web/layout')
@section('content')
       
 
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" antrian-bs-interval="5000" class="carousel slide carousel-fade" antrian-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">


        @foreach( $slider as $v )
					<li antrian-target="#carouselExampleCaptions" antrian-slide-to="{{ $loop->iteration }}"  ></li>
          <!-- Slide 1 -->
          <div class="carousel-item @if($loop->iteration==1) active @endif" " style="background-image: url({{ asset('upload/slider/'.$v->gambar)}});">
            <div class="carousel-container">
              <div class="carousel-content animate__animated animate__fadeInUp">
                <h2><span>{{ $v->judul }}</span></h2>
                <p>{{ $v->isi }}</p>
                <!-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> -->
              </div>
            </div>
          </div>
        @endforeach

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" antrian-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" antrian-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" >
        
        <div class="row mt-5 justify-content-center" antrian-aos="fade-up">
          <div class="col-lg-12">
            
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
						
            <!-- <div class="bd-example">
			<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
          @foreach($faskes as $v)
					<div class="carousel-item @if($loop->iteration==1) active @endif">
						<center><p style="font-size:20px">{{ $v->nama_faskes }}</p></center>
            @php
            $tanggal = date('Y-m-d');
            $jam = date('H:i:s');

            if(($tanggal==date('Y-m-d')) && ($jam>='13:00:00' && $jam<='24:00:00')){
              $jumlah_antrian = DB::table('antrian_tbl')->where('status',0)->where('status_hapus',0)->where('faskes',$v->id)->where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))->count();
            } else if(($tanggal==date('Y-m-d')) && ($jam>='00:00:00' && $jam<='12:00:00')) { 
              $jumlah_antrian = DB::table('antrian_tbl')->where('status',0)->where('status_hapus',0)->where('faskes',$v->id)->where('tanggal',date('Y-m-d'))->count();
            } else {
              $jumlah_antrian = DB::table('antrian_tbl')->where('status',0)->where('status_hapus',0)->where('faskes',$v->id)->where('tanggal',date('Y-m-d'))->count();
            }
             
            @endphp
            <center><p style="font-size:30px">Sisa Antrian : {{ $v->jumlah_antrian - $jumlah_antrian }}</p></center>
					</div>
          @endforeach
				</div>
				<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div -->
            <div class="row">
            <div class="box-header with-border">
              <div class="box-tools">
                <div style="padding-top:10px">
                <center>
                      <a href="{{ url('/antrian_w/create') }}" class="btn btn-success btn-flat btn-lg" title="Registrasi Vaksin" style="padding: 1rem 2rem;font-size: 1.5rem;">Registrasi Di Sini !!!</a>
                 
                </center>
                </div>
              </div>
            </div></div><br>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


	<script src="{{ asset('assets2/js/jquery.js') }}"></script> 
	<script src="{{ asset('assets2/js/popper.js') }}"></script> 
	<script src="{{ asset('assets2/js/bootstrap.js') }}"></script>
@endsection
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
        <center><h2>{{ $title }}</h2></center>
        
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
						
            <div class="row">
            <div class="box-header with-border">
              <div class="box-tools pull-left" style="float: left;">
                <div style="padding-top:10px">
                @if($setting[0]->jumlah > $jumlah_antrian)
                    <a href="{{ url('/antrian_w/create') }}" class="btn btn-success btn-flat" title="Registrasi Vaksin">Registrasi Vaksin</a>
                @else
                    <a href="{{ url('/antrian_w/create') }}" class="btn btn-danger btn-flat" title="Registrasi Vaksin">Registrasi Vaksin</a>
                @endif
                    <a href="{{ url('/') }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>   
                </div>
              </div>
              <div class="box-tools pull-right" style="float: right;margin-top: 10px;">
                <div class="form-inline">
                @if(Request::segment(2)=="")
                  <form action="{{ url('/antrian_w/search') }}" method="GET">
                @elseif (Request::segment(2)=="hari_ini")
                  <form action="{{ url('/antrian_w/hari_ini/search') }}" method="GET">
                @elseif (Request::segment(2)=="besok")
                  <form action="{{ url('/antrian_w/besok/search') }}" method="GET">
                @endif
                    <div class="input-group margin">
                      <input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian" style="border-radius: 0;">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger btn-flat">cari</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
            </div></div><br>
            <center>
              <a href="{{ url('/antrian_w/hari_ini') }}" class="btn @if(Request::segment(2)=="" || Request::segment(2)=="hari_ini") btn-success btn-flat @else btn-default btn-flat" style="background-color: #ffffff;border-color: #9e9e9e;" @endif title="Registrasi Vaksin">Hari Ini</a>
              <a href="{{ url('/antrian_w/besok') }}" class="btn @if(Request::segment(2)=="besok") btn-success btn-flat @else btn-default btn-flat" style="background-color: #ffffff;border-color: #9e9e9e;" @endif  title="Registrasi Vaksin">Besok</a>
            </center><br>
            <div class="table-responsive table-download box-body">
                <table class="table table-bordered table-striped table-hover">
                <tr class='info'>
                    <th width="50px">No Urut</th>
                    <th width="20px">NIK</th>
                    <th width="150px">Nama</th>
                    <th width="10px">Tanggal Lahir</th>
                    <th width="70px">No. HP</th>
                    <th width="10px">Status</th>
                    <th width="170px">Aksi</th>
                </tr>
                @foreach($antrian as $v)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $v->nik }}</td>
                      <td>{{ $v->nama }}</td>
						          <td>{{ date('d-m-Y', strtotime($v->tanggal_lahir)) }}</td>
                      <td>{{ $v->no_hp }}</td>
                      <td>
                        @if($v->status==0)
                          <span class="label label-danger" style="background-color: #dd4b39 !important;">Belum Di Vaksin</span>
                        @elseif($v->status==1)
                          <span class="label label-success" style="background-color: #00a65a !important;">Telah Di Vaksin</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ asset('/antrian_w/detail/'.$v->id) }}" class="btn btn-sm btn-primary btn-flat">Lihat Data<i class="icofont-download"></i></a>
                        <a href="{{ asset('/antrian_w/cetak/'.$v->id) }}" class="btn btn-sm btn-info btn-flat">Cetak No. Antrian<i class="icofont-download"></i></a>
                      </td>
			
                    </tr>
                @endforeach
                </table>
            </div>
            <div align="right" style="float: right;">{{ $antrian->appends(Request::only('search'))->links() }}</div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
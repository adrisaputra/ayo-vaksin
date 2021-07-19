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
        <center><h2>{{ $title }}</h2></center>
        
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            
            <form action="{{ url('/antrian_w')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
						
              <div class="row">
                <div class="col-md-3 form-group">
                  <p>NIK</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="nik" class="form-control" value="{{ $antrian->nik }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Nama Lengkap</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="nama" class="form-control" value="{{ $antrian->nama }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Tempat Lahir</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tempat_lahir" class="form-control" value="{{ $antrian->tempat_lahir }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Tanggal Lahir</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tanggal_lahir" class="form-control" value="{{ $antrian->tanggal_lahir }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Alamat Sesuai KTP & Domisili</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="alamat" class="form-control" value="{{ $antrian->alamat }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Pekerjaan</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="pekerjaan" class="form-control" value="{{ $antrian->pekerjaan }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Instansi / Tempat Kerja</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tempat_kerja" class="form-control"  value="{{ $antrian->tempat_kerja }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>No. HP</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="no_hp" class="form-control" value="{{ $antrian->no_hp }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Vaksin Ke</p>
                </div>
                <div class="col-md-9 form-group">
                @if($antrian->vaksin_ke == 1)
                 <input type="text" name="vaksin_ke" class="form-control" value="{{ __('Pertama') }}" disabled>
                @else
                  <input type="text" name="vaksin_ke" class="form-control" value="{{ __('Kedua') }}" disabled>
                @endif
              </div>

              @if($antrian->vaksin_ke == 2)
              <br>
              <br>
              <hr>
              <center>DATA VAKSIN PERTAMA</center>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>No. Tiket</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="no_tiket" class="form-control" value="{{ $antrian->no_tiket }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Tanggal Vaksin Pertama</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="tanggal_vaksin_pertama" class="form-control" value="{{ $antrian->tanggal_vaksin_pertama }}" disabled>
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-3 form-group">
                  <p>Faskes</p>
                </div>
                <div class="col-md-9 form-group">
                  <input type="text" name="faskes" class="form-control" value="{{ $antrian->faskes }}" disabled>
                </div>
              </div>
              <br>
              
              @endif
              
              <br>
              <br>
              <div class="text-center"><a href="{{ url('/') }}"  class="btn btn-success" style="background: #f39c12;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 4px;">Kembali</a></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
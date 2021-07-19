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

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
          <h2><strong>Berita</strong></h2>
      </div>
      
      <div class="row">
              <div class="col-lg-5" >
              </div>  
              <div class="col-lg-7" data-aos="fade-up">
              <div class="box-tools pull-right" style="float: right;margin-top: 10px;">
                <div class="form-inline">
                  <form action="{{ url('/berita_w/search') }}" method="GET">
                    <div class="input-group margin">
                      <input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian" style="border-radius: 0;">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger btn-flat">cari</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
                </div>
      </div><br><br>
      
      @foreach($berita as $v)
        <div class="row">
              <div class="col-lg-5" data-aos="fade-up">
                <img src="{{ asset('upload/berita/'.$v->foto) }}" width="450px" height="300px" alt="" style="height: 260px;">
              </div>  
              <div class="col-lg-7">
              <h3 data-aos="fade-up">{{ $v->judul }}</h3>
                <!--div class="blog-meta">
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">13 comments</a>
                  </span>
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                  </span>
                </div-->
                <div class="blog-text" data-aos="fade-up">
                  <p data-aos="fade-up"> 
                  <?php
                $content = substr($v->isi, 0, 400);
              ?>
              {!! $content !!} ...
                  </p>
                </div>
                <a href="{{ url('detail_berita_w/'.$v->id ) }}" 
                    style="display: inline-block;
                    background: #28a745;
                    color: #fff;
                    padding: 4px 10px;
                    font-size: 12px;
                    border-radius: 4px;" data-aos="fade-up">Read More</a>
                </div>
        </div><br><br>
      @endforeach
      <div align="right" style="float: right;">{{ $berita->appends(Request::only('search'))->links() }}</div>
      </div>
      
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection
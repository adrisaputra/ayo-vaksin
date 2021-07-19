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
            
            <div class="row">
            <div class="box-header with-border">
              <div class="box-tools pull-left" style="float: left;">
                <div style="padding-top:10px">
                </div>
              </div>
              <div class="box-tools pull-right" style="float: right;margin-top: 10px;">
                <div class="form-inline">
                  <form action="{{ url('/dokumen_w/search') }}" method="GET">
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

            <div class="table-responsive table-download box-body">
                <table class="table table-bordered table-striped table-hover">
                <tr class='info'>
                    <th width="5px">#</th>
                    <th width="500px">Nama Dokumen</th>
                    <th width="5px">File</th>
                </tr>
                @foreach($dokumen as $v)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $v->judul }}</td>
                      <td>
                        @if($v->dokumen)
                          <a href="{{ asset('upload/dokumen/'.$v->dokumen) }}" class="btn btn-sm btn-primary" target="_blank">Download File</a>
                        @endif
                      </td>
                    </tr>
                @endforeach
                </table>
            </div>
            <div align="right" style="float: right;">{{ $dokumen->appends(Request::only('search'))->links() }}</div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
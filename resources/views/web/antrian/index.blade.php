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
          <div class="col-lg-12">
            
            <div class="row">
            <div class="box-header with-border">
              <div class="box-tools" style="float: right;margin-top: 10px;">
                <div class="form-inline">
                  <form action="{{ url('/antrian_w/search') }}" method="GET">
                  <!-- <input type="text" class="date form-control" placeholder="Tanggal" name="tanggal" value="@if(Request::get('tanggal')) {{ Request::get('tanggal') }} @else {{ date('Y-m-d') }} @endif"> -->
                  <div class="input-group margin">
                    <input type="text" class="form-control" name="search" placeholder="Masukkan NIK / Nama">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-danger btn-flat">cari</button>
                    </span>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </div><br>

            <div class="table-responsive table-download box-body">
                <table class="table table-bordered table-striped">
                <tr class='info'>
                  <th width="50px">No Urut</th>
                  <th width="160px">Nama</th>
                  <th width="50px">Tanggal Vaksin</th>
                  <th width="50px">Vaksin Ke</th>
                  <th width="50px">Keterangan</th>
                  <th width="100px">Aksi</th>
                </tr>
                @if($tampil_antrian==1)
                  @foreach($antrian as $v)
                  <tr>
                    <td>{{ $v->no_urut }}</td>
                    <td>{{ $v->nama }}</td>
                    <td>{{ date('d-m-Y', strtotime($v->tanggal)) }}</td>
                    <td>
                      @if($v->vaksin_ke==1)
                        Vaksin 1
                      @elseif($v->vaksin_ke==3)
                        Vaksin 1
                      @elseif($v->vaksin_ke==2)
                        Vaksin 2
                      @endif
                    </td>
                    <td>
                      @if($v->vaksin_ke==1)
                        Vaksin Pertama
                      @elseif($v->vaksin_ke==2)
                        Vaksin Kedua
                      @elseif($v->vaksin_ke==3)
                        Untuk Lansia
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('/antrian_w/cetak/'.$v->id) }}" class="btn btn-xs btn-primary btn-flat btn-block">Cetak Tiket<i class="icofont-download"></i></a>
                    </td>
                  </tr>
                  @endforeach
                @endif
                </table>
            </div>
            
            @if($tampil_antrian==1)
              <div align="right" style="float: right;">{{ $antrian->appends(Request::only('search'))->links() }}</div>
            @endif
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
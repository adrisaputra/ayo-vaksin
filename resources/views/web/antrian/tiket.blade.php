@extends('web/layout')
@section('content')


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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
      
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
             <center><a href="{{ url('/antrian_w/cetak/'.Request::segment(3)) }}" class="btn btn-success btn-flat btn-lg" title="Registrasi Vaksin" style="padding: 1rem 2rem;font-size: 1.5rem;" >Cetak Tiket Di Sini !!!</a></center><br>
             <!-- <center><a href="{{ url('/') }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali Ke Halaman Utama</a></center> -->
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
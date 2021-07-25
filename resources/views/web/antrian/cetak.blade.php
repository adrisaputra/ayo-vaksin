<html>
<head>
  <style>
    @page { size: 15cm 12cm landscape; }
  </style>
</head>
<body>
  Tanggal Daftar : {{ date('d-m-Y (H:i:s)', strtotime($antrian[0]->created_at)) }}<br>
  Tanggal Vaksin : {{ date('d-m-Y', strtotime($antrian[0]->tanggal)) }}<br>
  Nama : {{ $antrian[0]->nama }}<br>
  NIK: {{ $antrian[0]->nik }}<br>
  Faskes: {{ $antrian[0]->nama_faskes }}<br><br>
  <center>NOMOR ANTRIAN</center>

  <center><p style="font-size:70px"><b>{{ $antrian[0]->no_urut  }}</b></p></center>

  <center>Harap Registrasi Ulang Sebelum jam 11.00 WITA</center><br>
  <center>DINAS KESEHATAN KOTA KENDARI</center>
  <center>Silahkan Capture Gambar Ini</center>
</body>
</html>
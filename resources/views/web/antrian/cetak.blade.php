<html>
<head>
  <style>
    @page { size: 13cm 10cm landscape; }
  </style>
</head>
<body>
  Tanggal Daftar : {{ $antrian[0]->created_at }} <br>
  Tanggal Vaksin : {{ $antrian[0]->tanggal }}<br>
  Nama : {{ $antrian[0]->nama }}<br>
  NIK: {{ $antrian[0]->nik }}<br><br>
  <center>NOMOR ANTRIAN</center>

  <center><p style="font-size:70px"><b>{{ $antrian[0]->no_urut  }}</b></p></center>

  <center>DINKES KOTA KENDARI</center>
</body>
</html>
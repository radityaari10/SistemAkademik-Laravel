<!DOCTYPE html>
<html>
<head>
  <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <style type="text/css">
    table tr td, table tr th{
      font-size: 9pt;
    }
  </style>
  <center>
    <h5>Laporan Data Mahasiswa</h5>
  </center>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Nomor Telepon</th>
      </tr>
    </thead>
    <tbody>
      @php
          $i = 1
      @endphp
      @foreach ($mahasiswa_list as $mahasiswa)
        <tr>
          <td>{{ $mahasiswa->nim  }}</td>
          <td>{{ $mahasiswa->nama  }}</td>
          <td>{{ $mahasiswa->kelas['nama_kelas']  }}</td>
          <td>{{ $mahasiswa->tanggal_lahir->format('d-m-Y')  }}</td>
          <td>{{ $mahasiswa->jenis_kelamin  }}</td>
          <td>{{ !empty($mahasiswa->telepon['nomor_telepon'])?
                  $mahasiswa->telepon['nomor_telepon'] : '-'  }}</td>          
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>

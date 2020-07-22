<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Akademik</title>
    {{-- Memanggil Bootstrap
        hanya komen saja tidak tampil di halaman web --}}
    <link rel="stylesheet" href="{{ asset('../../../public/bootstrap-3.3.6/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('../../../public/css/style.css')}}">
</head>
<body>
    
    <div class="container">
        <h2>Input Data Mahasiswa</h2>
        <form action="{{ url('tampilkan')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="prodi">Prodi :</label>
                <input type="text" name="prodi" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir :</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat :</label>
                <textarea type="text" name="alamat" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="hobi">Hobi :</label>
                <input type="text" name="hobi" class="form-control">
            </div>
            <div class="form-group">
                <label for="quote">Quote :</label>
                <input type="text" name="quote" class="form-control">
            </div>
            <div class="form-group">
                <input class="btn btn-primary form-control" type="submit" value="Simpan">
            </div>
        </form>
    </div>

    <script src="{{ asset('../../../public/js/jquery-2.2.1.min.js')}}"></script>
    <script src="{{ asset('../../../public/bootstrap-3.3.6/js/bootstrap.min.js')}}"></script>
</body>
</html>

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
        @include('navbar')
        @yield('main')
    </div>
        @yield('footer')
    <script src="{{ asset('../../../public/js/jquery-2.2.1.min.js')}}"></script>
    <script src="{{ asset('../../../public/bootstrap-3.3.6/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('../../../public/js/mahasiswaap.js')}}"></script>
</body>
</html>
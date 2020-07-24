@extends('template')

@section('main')
  <div id="kelas">
    <h2>Tambah Kelas</h2>
    {!! Form::open(['url'=>'kelas']) !!}
      @include('kelas/form', ['submitButtonText'=>'Simpan'])
    {!! Form::close() !!}
  </div>
@endsection

@section('footer')
  <div id="footer">
    <p>&copy; Polines 2020</p>
  </div>
@endsection

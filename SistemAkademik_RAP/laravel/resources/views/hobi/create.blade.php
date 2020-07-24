@extends('template')

@section('main')
  <div id="hobi">
    <h2>Tambah Hobi</h2>
    {!! Form::open(['url'=>'hobi']) !!}
      @include('hobi/form', ['submitButtonText'=>'Simpan'])
    {!! Form::close() !!}
  </div>
@endsection

@section('footer')
  <div id="footer">
    <p>&copy; Polines 2020</p>
  </div>
@endsection

@extends('template')

@section('main')
  <div id="user">
    <h2>Tambah User</h2>
    {!! Form::open(['url'=>'user']) !!}
      @include('user/form', ['submitButtonText'=>'Simpan'])
    {!! Form::close() !!}
  </div>
@endsection

@section('footer')
  <div id="footer">
    <p>&copy; Polines 2020</p>
  </div>
@endsection

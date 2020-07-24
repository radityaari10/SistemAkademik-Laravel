@extends('template')

@section('main')
  <div id="kelas">
    <h2>Edit Data Kelas</h2>
    {!! Form::model($kelas, 
      ['method'=> 'PATCH', 'action'=>['KelasController@update', $kelas->id]]) !!}
      @include('kelas/form', ['submitButtonText'=>'Update'])
    {!! Form::close() !!}
  </div>
@endsection

@section('footer')
  <div id="footer">
    <p>&copy; Polines 2020</p>
  </div>
@endsection

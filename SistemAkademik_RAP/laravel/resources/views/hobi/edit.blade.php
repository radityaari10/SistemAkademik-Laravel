@extends('template')

@section('main')
  <div id="hobi">
    <h2>Edit Data Hobi</h2>
    {!! Form::model($hobi, 
      ['method'=> 'PATCH', 'action'=>['HobiController@update', $hobi->id]]) !!}
      @include('hobi/form', ['submitButtonText'=>'Update'])
    {!! Form::close() !!}
  </div>
@endsection

@section('footer')
  <div id="footer">
    <p>&copy; Polines 2020</p>
  </div>
@endsection

@extends('template')

@section('main')
  <div id="user">
    <h2>Edit Data User</h2>
    {!! Form::model($user, 
      ['method'=> 'PATCH', 'action'=>['UserController@update', $user->id]]) !!}
      @include('user/form', ['submitButtonText'=>'Update'])
    {!! Form::close() !!}
  </div>
@endsection

@section('footer')
  <div id="footer">
    <p>&copy; Polines 2020</p>
  </div>
@endsection

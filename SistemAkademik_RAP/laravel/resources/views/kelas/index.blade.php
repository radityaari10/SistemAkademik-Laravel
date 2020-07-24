@extends('template')

@section('main')
  <div id="kelas">
    <h2>Kelas</h2>
    @include('_partial.flash_message')
    
    @if (count($kelas_list)>0)
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kelas_list as $index => $kelas) 
            <tr>
              <td>{{ ++$index }}</td>
              <td>{{ $kelas->nama_kelas }}</td>
              <td>
                <div class="box-button">
                  {{ link_to('kelas/'.$kelas->id.'/edit', 'Edit', ['class'=>'btn btn-warning btn-sm']) }}
                </div>
                <div class="box-button">
                  {!! Form::open(['method'=>'DELETE','action'=>['KelasController@destroy',$kelas->id]]) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}                  
                  {!! Form::close() !!}
                </div>  
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>  
    @else
      <p>Tidak ada data kelas</p>
    @endif

    <div class="tombol-nav">
      <div>
        <a href="{{ url('kelas/create') }}" class="btn btn-primary">Tambah Kelas</a>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  <div id="footer">
    <p>&copy; Polines 2020</p>
  </div>
@endsection

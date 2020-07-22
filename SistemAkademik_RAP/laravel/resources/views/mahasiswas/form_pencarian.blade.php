<div id="pencarian">
  {{!! Form::open(['url'=>'mahasiswa/cari', 'method'=>'GET']) !!}}
    <div class="input-group">
      {{!! Form::text('kata_kunci', (!empty($kata_kunci))?$kata_kunci:null, 
        ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Mahasiswa']) !!}}
        <span class="input-group-btn">
          {{!! Form::button('Cari', ['class'=>'btn btn-default', 'type'=>'submit']) !!}}
        </span>
    </div>
  {{!! Form::close() !!}}
</div>

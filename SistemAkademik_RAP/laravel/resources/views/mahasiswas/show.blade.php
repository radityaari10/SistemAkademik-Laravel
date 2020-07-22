@extends('template')

@section('main')
	<div id="mahasiswa">
		<h2>Data Mahasiswa</h2>
		<table class="table table-striped">
			<tr>
				<th>NIM</th>
				<td>{{ $mahasiswa->nim }}</td>
			</tr>
			<tr>
				<th>Nama</th>
				<td>{{ $mahasiswa->nama }}</td>
			</tr>
			<tr>
				<th>Kelas</th>
				<td>{{ $mahasiswa->kelas['nama_kelas'] }}</td>
			</tr>
			<tr>
				<th>Tanggal Lahir</th>
				<td>{{ $mahasiswa->tanggal_lahir->format('d-m-Y') }}</td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td>{{ $mahasiswa->jenis_kelamin }}</td>
			</tr>
			<tr>
				<th>Nomor Telepon</th>
				<td>{{ !empty($mahasiswa->telepon['nomor_telepon'])?
					$mahasiswa->telepon['nomor_telepon'] : '-' }}</td>
			</tr>
			<tr>
				<th>Hobi</th>
				<td>
					@foreach ($mahasiswa->hobi as $item)
						<span>{{ $item->nama_hobi }}</span>,
					@endforeach
				</td>
			</tr>
			<tr>
				<th>Foto</th>
				<td>
					@if (isset($mahasiswa->foto))
						<img class="sizePhoto" src="{{ asset('public/dataFoto/'.$mahasiswa->foto) }}" 
									alt="{{ 'Profil '.$mahasiswa->nama }}">
					@else
							@if ($mahasiswa->jenis_kelamin == 'L')
								<img src="{{ asset('public/dataFoto/male.png') }}" alt="">
							@else
								<img src="{{ asset('public/dataFoto/female.png') }}" alt="">
							@endif
					@endif
				</td>
			</tr>
		</table>
	</div>
@endsection

@section('footer')
	<div id="footer">
		<p>&copy; Polines 2020</p>
	</div>
@endsection
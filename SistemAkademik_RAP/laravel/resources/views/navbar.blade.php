<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapse" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only"> Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		<a class="navbar-brand" href="{{ url('/') }}">Sistem Akademik</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@if(!empty($halaman) && $halaman =='data_mahasiswa')
						<li class="active"><a href="{{url('data_mahasiswa')}}">
								Mahasiswa<span class="sr-only">(current)</span></a></li>
				@else
						<li><a href="{{url('data_mahasiswa')}}">Mahasiswa</a></li>
				@endif

				@if(!empty($halaman) && $halaman =='lihat_data_mahasiswa')
						<li class="active"><a href="{{url('lihat_data_mahasiswa')}}">
								Data Mahasiswa<span class="sr-only">(current)</span></a></li>
				@else
						<li><a href="{{url('lihat_data_mahasiswa')}}">Data Mahasiswa</a></li>
				@endif

				@if(!empty($halaman) && $halaman =='kelas')
						<li class="active"><a href="{{url('kelas')}}">
								Kelas<span class="sr-only">(current)</span></a></li>
				@else
						<li><a href="{{url('kelas')}}">Kelas</a></li>
				@endif

				@if(!empty($halaman) && $halaman =='hobi')
						<li class="active"><a href="{{url('hobi')}}">
								Hobi<span class="sr-only">(current)</span></a></li>
				@else
						<li><a href="{{url('hobi')}}">Hobi</a></li>
				@endif

				@if(!empty($halaman) && $halaman =='input_mahasiswa')
						<li class="active"><a href="{{url('input_mahasiswa')}}">
								Input Data Mahasiswa<span class="sr-only">(current)</span></a></li>
				@else
						<li><a href="{{url('input_mahasiswa')}}">Input Data Mahasiswa</a></li>
				@endif

				@if (!empty($halaman) && $halaman =='user')
					<li class="active"><a href="{{url('user')}}">
							User<span class="sr-only">(current)</span></a></li>
				@else
					<li><a href="{{url('user')}}">User</a></li>
				@endif
				
				@if(!empty($halaman) && $halaman =='create')
						<li class="active"><a href="{{url('create')}}">
								Input Data Mahasiswa (2)<span class="sr-only">(current)</span></a></li>
				@else
						<li><a href="{{url('create')}}">Input Data Mahasiswa (2)</a></li>
				@endif
					
			</ul>

			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li>{{ 'Hai '.Auth::user()->name }}
						<div class="box-button">
							{!! Form::open(['method'=>'POST', 'url'=>'logout']) !!}
								{!! Form::submit('LOGOUT', ['class'=>'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}			
						</div>
						
					</li>	
				@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{_('Login')}}</a>
					</li>
				@endif
			</ul>

		</div>
	</div>
</nav>

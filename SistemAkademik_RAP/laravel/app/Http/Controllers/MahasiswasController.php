<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
// use Validator;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use App\Http\Requests\MahasiswaRequest;
use Storage;
use Session;

class MahasiswasController extends Controller
{
    public function data_mahasiswa(){
			$halaman = 'data_mahasiswa';
			return view('mahasiswas/data_mahasiswa', compact('halaman'));
    }

    public function lihat_data_mahasiswa(){
			$halaman = 'lihat_data_mahasiswa';
			$mahasiswa_list = Mahasiswa::orderBy('nim', 'asc')->Paginate(3);
			$jumlah_mahasiswa = Mahasiswa::count();
			return view('mahasiswas/lihat_data_mahasiswa', compact('halaman','mahasiswa_list', 'jumlah_mahasiswa'));
		}
		
		protected $request;

    public function __construct(Request $req)
    {
        $this->request = $req;
    }

		// Sebelum di rubah lihat_data mahasiswa

		// public function lihat_data_mahasiswa(){
		// 	$halaman = 'lihat_data_mahasiswa';
		// 	$mahasiswa = ['Budiman',
		// 								'Maryono',
		// 								'Dina',
		// 								'Rusli'    
		// 	];
		// 	return view('mahasiswas/lihat_data_mahasiswa', compact('halaman','mahasiswa'));
		// }

	public function show(Mahasiswa $mahasiswa){
		return view('mahasiswas/show', compact('mahasiswa'));
	}

	public function create(){
		return view('mahasiswas/create');
	}
	// $halaman = 'create';

	public function lihat_data_mahasiswa2(){
		$mahasiswa = ['Budiman',
						'Maryono',
						'Dina',
						'Rusli'    
		];
		return view('mahasiswas/lihat_data_mahasiswa2')->with('mahasiswa', $mahasiswa);
	}

	public function input_mahasiswa(){
		$halaman = 'input_mahasiswa';
		return view('mahasiswas/input_mahasiswa', compact('halaman'));
	}

	public function store(MahasiswaRequest $req){
		$input = $req->all();
		// foto
		if($req->hasFile('foto')){
			$foto = $req->file('foto');
			$ext = $foto->getClientOriginalExtension();
			if($req->file('foto')->isValid()){
				$foto_name = date('YmdHis'). ".$ext";
				$upload_path ='public/dataFoto';
				$req->file('foto')->move($upload_path, $foto_name);
				$input['foto'] = $foto_name;
			}
		}

		$mahasiswa = Mahasiswa::create($input);

		$telepon = new Telepon;
		$telepon->nomor_telepon = $req->input('nomor_telepon');
		$mahasiswa->telepon()->save($telepon);

		$mahasiswa->hobi()->attach($req->input('hobi_mahasiswa'));

		Session::flash('flash_message', 'Data mahasiswa berhasil disimpan');

		return redirect('lihat_data_mahasiswa');
	}

	public function edit(Mahasiswa $mahasiswa){
		if(!empty($mahasiswa->telepon->nomor_telepon)){
			$mahasiswa->nomor_telepon = $mahasiswa->telepon->nomor_telepon;
		}
		
		return view('mahasiswas/edit', compact('mahasiswa'));
	}

	public function update(Mahasiswa $mahasiswa, MahasiswaRequest $req){
		$input = $req->all();

		if($req->hasFile('foto')){
			$exist = Storage::disk('foto')->exists($mahasiswa->foto);
			if(isset($mahasiswa->foto)&& $exist){
				$delete = Storage::disk('foto')->delete($mahasiswa->foto);
			}
			
			$foto = $req->file('foto');
			$ext = $foto->getClientOriginalExtension();
			if($req->file('foto')->isValid()){
				$foto_name = date('YmdHis'). ".$ext";
				$upload_path ='public/dataFoto';
				$req->file('foto')->move($upload_path, $foto_name);
				$input['foto'] = $foto_name;
			}
		}

		$mahasiswa->update($input);
		
		if($mahasiswa->telepon){
			if($req->filled('nomor_telepon')){
				$telepon = $mahasiswa->telepon;
				$telepon->nomor_telepon = $req->input('nomor_telepon');
				$mahasiswa->telepon()->save($telepon);
			}
			else{
				$mahasiswa->telepon()->delete();
			}
		}
		else{
			if($req->filled('nomor_telepon')){
				$telepon = new Telepon;
				$telepon->nomor_telepon = $req->input('nomor_telepon');
				$mahasiswa->telepon()->save($telepon);
			}
		}

		$mahasiswa->hobi()->sync($req->input('hobi_mahasiswa'));

		Session::flash('flash_message', 'Data mahasiswa berhasil diupdate');

		return redirect('lihat_data_mahasiswa');
	}

		// public function update($id, Request $req){
		// 	$mahasiswa = Mahasiswa::findOrFail($id);
		// 	$mahasiswa->update($req->all());
		// 	return redirect('lihat_data_mahasiswa');
		// }

		public function destroy(Mahasiswa $mahasiswa){
			$mahasiswa->delete();
			Session::flash('flash_message', 'Data mahasiswa berhasil dihapus');
			Session::flash('penting', true);
			return redirect('lihat_data_mahasiswa');
		}

		public function cari(Request $req){
			$kata_kunci = trim($req->input('kata_kunci'));

			if(!empty($kata_kunci)){
				$jenis_kelamin = $req->input('jenis_kelamin');
				$id_kelas = $req->input('id_kelas');

				$query = Mahasiswa::where('nama', 'LIKE', '%'.$kata_kunci.'%');
				(!empty($jenis_kelamin)) ? $query->JenisKelamin($jenis_kelamin) : '';
				(!empty($id_kelas)) ? $query->Kelas($id_kelas) : '';
				$mahasiswa_list = $query->paginate(2);
				
				$pagination = (!empty($jenis_kelamin)) ? $mahasiswa_list->appends(['jenis_kelamin'=>$jenis_kelamin]): '';
				$pagination = (!empty($id_kelas)) ? $mahasiswa_list->appends(['jenis_kelamin'=>$id_kelas]): '';
				$pagination = $mahasiswa_list->appends($req->except('page'));

				$jumlah_mahasiswa = $mahasiswa_list->total();
				return view('mahasiswas/lihat_data_mahasiswa', compact('mahasiswa_list', 'kata_kunci', 'pagination', 'jumlah_mahasiswa',
					'id_kelas', 'jenis_kelamin'));
			}

			return redirect('lihat_data_mahasiswa');
		}

		// public function store(Request $req){
		// 	$mahasiswa = New Mahasiswa;
		// 	$mahasiswa->nim = $req->nim;
		// 	$mahasiswa->nama = $req->nama;
		// 	$mahasiswa->tanggal_lahir = $req->tanggal_lahir;
		// 	$mahasiswa->jenis_kelamin = $req->jenis_kelamin;
		// 	$mahasiswa->save();
		// 	return redirect('lihat_data_mahasiswa');
		// }

		// Sebelum diubah
    // public function store(Request $request){
    //     $mahasiswa = $request->all();
    //     return $mahasiswa;
    // }

		// Jobsheet9
		
		public function cobaCollection(){
			$daftar = ['Budi Pranoto',
									'Amy Delia',
									'Cakra Lukman',
									'Dewi Nova',
									'Kartini Indah',
									'Raditya Ari'
			];
			$collection = collect($daftar)->map(function($nama){
				return ucwords($nama);
			});
			return $collection;
		}

		public function collection_first(){
			$collection = Mahasiswa::all()->first();
			return $collection;
		}

		public function collection_last(){
			$collection = Mahasiswa::all()->last();
			return $collection;
		}

		public function collection_count(){
			$collection = Mahasiswa::all();
			$jumlah = $collection->count();
			return 'Jumlah mahasiswa : '.$jumlah;
		}

		public function collection_take(){
			$collection = Mahasiswa::all()->take(3);
			return $collection;
		}

		public function collection_pluck(){
			$collection = Mahasiswa::all()->pluck('nama');
			return $collection;
		}

		public function collection_where(){
			$collection = Mahasiswa::all()->where('nim', '1001');
			return $collection;
		}

		public function collection_wherein(){
			$collection = Mahasiswa::all()->whereIn('nim', ['1001', '1002', '1003']);
			return $collection;
		}

		public function collection_toarray(){
			$collection = Mahasiswa::select('nim', 'nama')->take(4)->get();
			$koleksi = $collection->toArray();
			foreach($koleksi as $mahasiswa){
				echo $mahasiswa['nim'].' - '.$mahasiswa['nama'].'<br>';
			}
		}

		public function collection_tojson(){
			$data = [
				['nim'=>'1001', 'nama'=>'Agus Yulianto'],
				['nim'=>'1002', 'nama'=>'Citra Kusumawati'],
				['nim'=>'1003', 'nama'=>'Firda Ajeng'],
				['nim'=>'1004', 'nama'=>'Amira Widya'],
			];
			$collection = collect($data)->toJson();
			return $collection;
		}

		// Jobsheet 10

		public function date_mutator(){
			$mahasiswa = Mahasiswa::findOrFail(8);
			$nama = $mahasiswa->nama;
			$tanggal_lahir = $mahasiswa->tanggal_lahir->format('d-m-Y');
			$ulang_tahun = $mahasiswa->tanggal_lahir->addYears(25)->format('d-m-Y');
			return "Mahasiswa {$nama} lahir pada {$tanggal_lahir}. <br>
				Ulang tahun ke-25 akan jatuh pada {$ulang_tahun}";
		}


}

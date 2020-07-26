<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Validator;
use Session;

class UserController extends Controller
{
	public function index()
	{
		$user_list = User::all();
		return view('user/index', compact('user_list'));
	}

	public function create()
	{
		return view('user/create');
	}

	public function store(Request $request)
	{
		$data = $request->all();

		$validasi = Validator::make($data,[
			'name'=>'required|max:255',
			'email'=>'required|email|max:100|unique:users',
			'password'=>'required|min:6',
			'level'=>'required|in:admin,operator',
		]);

		if($validasi->fails()){
			return redirect('user/create')
				->withInput()
				->withErrors($validasi);
		}

		$data['password'] = bcrypt($data['password']);
		User::create($data);
		Session::flash('flash_message', 'Data user berhasil disimpan');
		return redirect('user');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('user/edit', compact('user'));
	}

	public function update(Request $request, $id)
	{
		$user = User::findOrFail($id);
		$data = $request->all();

		$validasi = Validator::make($data,[
			'name'=>'required|max:255',
			'email'=>'required|email|max:100|unique:users, email'.$data['id'],
			'password'=>'required|min:6',
			'level'=>'required|in:admin,operator',
		]);

		if($request->filled('password')){
			$data['password'] = bcrypt($data['password']);
		}else{
			$data = array_except($data, ['password']);
		}

		$user->update($data);
		Session::flash('flash_message', 'Data user berhasil diupdate');
		return redirect('user');
	}

	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();
		Session::flash('flash_message', 'Data user berhasil dihapus');
		Session::flash('penting', true);
		return redirect('user');
	}
}

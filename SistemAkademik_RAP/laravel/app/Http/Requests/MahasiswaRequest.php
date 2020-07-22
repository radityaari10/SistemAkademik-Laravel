<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 * @return array
	 */
	public function rules()
	{
		if($this->method() == 'PATCH'){
			$nim_rules = 'required|string|size:4|unique:mahasiswa,nim,'.$this->get('id');
			$telepon_rules = 'sometimes|required|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon,'
					.$this->get('id').',id_mahasiswa';
		}
		else{
			$nim_rules = 'required|string|size:4|unique:mahasiswa,nim';
			$telepon_rules = 'sometimes|required|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon';
		}
		return [
			'nim' => $nim_rules,
			'nama' => 'required|string|max:100',
			'tanggal_lahir' => 'required|date',
			'jenis_kelamin' => 'required|in:L,P',
			'nomor_telepon' => $telepon_rules,
			'id_kelas' => 'required',
			'foto' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500'
		];
	}
}

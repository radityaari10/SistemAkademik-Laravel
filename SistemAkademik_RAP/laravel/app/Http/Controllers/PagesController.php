<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function input(){
        return view('input_data');
    }

    public function tampilkan(Request $req){
        $nama = $req->input('nama');
        $prodi = $req->input('prodi');
        $tanggal_lahir = $req->input('tanggal_lahir');
        $alamat = $req->input('alamat');
        $hobi = $req->input('hobi');
        $quote = $req->input('quote');
        echo "Nama          : ".$nama."<br>";
        echo "Prodi         : ".$prodi."<br>";
        echo "Tanggal Lahir : ".$tanggal_lahir."<br>";
        echo "Alamat        : ".$alamat."<br>";
        echo "Hobi          : ".$hobi."<br>";
        echo "Quote         : ".$quote."<br>";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BerandaController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function about(){
        return view('about');
    }

    public function help(){
        return view('help');
    }
    
    public function tambahan(){
        return view('tambahan');
    }

    public function daftarbuku(){
        $buku = Buku::all();
        return view('buku', compact('buku'));
    }

}


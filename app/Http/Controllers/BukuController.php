<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahkan code berikut untuk memanggil model buku yang sudah dibuat
use File;
use App\Buku;

class BukuController extends Controller
{

    public function __construct(){
          $this->middleware('admin');
    }

    //fungsi index
    public function index(){
        $batas = 3;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('tgl_terbit','desc')->paginate($batas);
        $no = $batas *($data_buku->currentPage()-1);

        return view('buku.index', compact('data_buku','no','jumlah_buku'));
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul','like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $jumlah_buku = $data_buku->count();
        $no = $batas *($data_buku->currentPage()-1);

        return view('buku.search', compact('data_buku','no','jumlah_buku','cari'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul' => 'required|string|max:20',
            'penulis' => 'required|string',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();
        $foto->move('images/', $namafile);
        $buku->foto = $namafile;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/buku')->with('pesan','Data Buku Berhasil di simpan');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        $namafile = $buku->foto;
        File::delete($namafile);


        return redirect('/buku');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);

        return view('buku.edit', compact('buku'));        
    }
    
    public function update($id){
        $buku = Buku::find($id);
        $buku->judul = request('judul');
        $buku->penulis = request('penulis');
        if (request('foto')!= null){
            File::delete('images/'.$buku->foto);

            $foto = request('foto');
            $namafile = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('images/', $namafile);
            $buku->foto = $namafile;
        }
        $buku->harga = request('harga');
        $buku->tgl_terbit = request('tgl_terbit');
        $buku->save();

        return redirect('/buku');
    }
}


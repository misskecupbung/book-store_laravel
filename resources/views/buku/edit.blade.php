@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit Buku</h4>
    <form method="post" enctype="multipart/form-data" action="{{ route('buku.update', $buku->id ) }}">
        @csrf
        <div class="form-group row">
            <label for="judul_buku" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-9">
                 <input type="text" id="judul" name="judul" class="form-control" value="{{ $buku->judul }}">
           </div>
        </div>
        <div class="form-group row">
            <label for="judul_buku" class="col-sm-3 col-form-label">Penulis</label>
            <div class="col-sm-9">
                 <input type="text" id="penulis" name="penulis" class="form-control" value="{{ $buku->penulis }}">
           </div>
        </div>

        <div class="form-group row">
            <label for="judul_buku" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
                 <img src="{{ asset($buku->foto) }}" style="width: 100px">
                // <input type="text" id="penulis" name="penulis" class="form-control" value="{{ $buku->penulis }}">
                 <input type="file" class="form-control" name="foto">
           </div>
        </div>


        <div class="form-group row">
            <label for="judul_buku" class="col-sm-3 col-form-label">Harga</label>
            <div class="col-sm-9">
                 <input type="text" id="harga" name="harga" class="form-control" value="{{ $buku->harga }}">
           </div>
        </div>
        <div class="form-group row">
            <label for="judul_buku" class="col-sm-3 col-form-label">Tgl Terbit</label>
            <div class="col-sm-9">
                 <input type="text" id="tgl_terbit" name="tgl_terbit" class="form-control" value="{{ $buku->tgl_terbit }}">
           </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-9">
                 <button type="submit" class="btn btn-light">Update</button>
                 <a class="btn btn-warning" href ="/buku">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection

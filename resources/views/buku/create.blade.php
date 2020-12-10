@extends('layout.master')
@section('content')
    <div class="container">
        <h4>Tambah Buku</h4>
        @if(count($errors)>0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('buku.store') }}">
        @csrf
        <table>
            <tr> 
                <td>Judul</td><td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Penulis</td><td><input type="text" name="penulis"></td>
            </tr>
            <tr>
                <td>Foto</td><td><input type="file" class="form-control" name="foto"></td>
            </tr>
            <tr>
                <td>Harga</td><td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Tgl Terbit</td><td><input type="text" class="date" name="tgl_terbit"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-light">Simpan</button>
                <a class="btn btn-light" href="/buku">Batal</a>
                </td>
            </tr>
        </table>
    </div>
@endsection


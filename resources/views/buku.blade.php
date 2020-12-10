@extends('layout.master')

@section('content')
<section id="buku" class="py-1 text-center bg-light">
    <div class="container">
      <h2>Daftar Buku</h2>
      <hr>
      <div class="row">
        @foreach ($buku as $data)
        <div class="col-md-4">
            <a href="#">
            <img src="{{ $data->foto != null ? asset('images/'.$data->foto) : asset('image-not-found.jpg') }}" style="width:120px; height:150px">
            <p>
                <h5>{{ $data->judul }}</h5></a>
                (Penulis : {{ $data->penulis }})
            </p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection

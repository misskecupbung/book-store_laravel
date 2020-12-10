@extends('layout.master')
@section('content')
<div class="container">
    @if(Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    <h4>Data Buku</h4>
    <p align="right">
        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            Tambah Buku
        </a>
    </p>
    <form action="{{ route('buku.search') }}" method="get">@csrf
        <input type="text" name="kata" class="form-control" placeholder="Cari..." style="width:30%; display:inline; margin-top:10px; margin-bottom:10px; float:right;">
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $buku)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td><img src="{{ $buku->foto != null ? asset('images/'. $buku->foto) : asset('image-not-found.jpg') }}" style="width: 100px"></td>
                    <td>{{ "Rp ".number_format($buku->harga,2,',','.') }}</td>
                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('buku.destroy',$buku->id) }}" method="post">
                            @csrf
                            <a href="{{ route('buku.edit',$buku->id) }}" class="btn btn-info">ubah</a>
                            <button type="submit" class="btn btn-danger" onClick="return confirm('Apakah anda yakin menghapus?')">
                                hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <div class="kiri"><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
        <div class="kanan">{{ $data_buku->links() }}</div>
    </div>
</div>
@endsection


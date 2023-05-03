@extends('admin.main')

@section('title')
    Ubah data Portfolio
@endsection

@section('content')
    <h1>Ubah Data Portfolio</h1>
    <form action="/admin/portfolio/update{{ $portfolio['id_portfolio'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama Tempat</label>
            <input type="text" name="nama_tempat" class="form-control" id="" value="{{ $portfolio['nama_tempat'] }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal Post</label>
            <input type="date" name="tanggal_post" class="form-control" id="" value="{{ $portfolio['tanggal_post'] }}">
        </div>
        <div class="form-group">
            <label for="">Author</label>
            <input type="text" name="author" class="form-control" id="" value="{{ $portfolio['author'] }}">
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

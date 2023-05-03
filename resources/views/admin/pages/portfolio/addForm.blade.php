@extends('admin.main')

@section('title')
    Tambah data Portfolio
@endsection

@section('content')
    <h1>Tambah Data Portfolio</h1>
    <form action="/admin/portfolio/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Tempat</label>
            <input type="text" name="nama_tempat" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Tanggal Post</label>
            <input type="date" name="tanggal_post" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Author</label>
            <input type="text" name="author" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection

@extends('admin.main')

@section('title')
    Ubah data Prestasi
@endsection

@section('content')
    <h1>Ubah Data Prestasi</h1>
    <form action="/admin/prestasi/update/{{ $prestasi['id_prestasi'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" id="" value="{{ $prestasi['judul'] }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal post</label>
            <input type="date" name="tanggal_post" class="form-control" id="" value="{{ $prestasi['tanggal_post'] }}">
        </div>
        <div class="form-group">
            <label for="">Author</label>
            <input type="text" name="author" class="form-control" id="" value="{{ $prestasi['author'] }}">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="summernote">{{ $prestasi['description'] }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

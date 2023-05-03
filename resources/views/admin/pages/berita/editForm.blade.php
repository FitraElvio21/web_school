@extends('admin.main')

@section('title')
    Ubah data berita
@endsection

@section('content')
    <h1>Ubah Data berita</h1>
    <form action="/admin/berita/update/{{ $berita['id_berita'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" id="" value="{{ $berita['judul'] }}">
        </div>
        <div class="form-group">
            <label for="">Isi</label>
            <textarea name="isi" id="isi" cols="160" rows="5">{{ $berita['isi'] }}</textarea>

        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

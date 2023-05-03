@extends('admin.main')

@section('title')
    Ubah data About
@endsection

@section('content')
    <h1>Ubah Data About</h1>
    <form action="/admin/about/update/{{ $about['id_about'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" id="" value="{{ $about['judul'] }}">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="" cols="160" rows="5">{{ $about['description'] }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Visi</label>
            <input type="text" name="visi" class="form-control" id="" value="{{ $about['visi'] }}">
        </div>
        <div class="form-group">
            <label for="">Misi</label>
            <input type="text" name="misi" class="form-control" id="" value="{{ $about['misi'] }}">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

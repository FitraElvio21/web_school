@extends('admin.main')

@section('title')
    Tambah data profile
@endsection

@section('content')
    <h1>Tambah Data profile</h1>
    <form action="/admin/profile/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="description" cols="160" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection

@extends('admin.main')

@section('title')
    Tambah data Jurusan
@endsection

@section('content')
    <h1>Tambah Data Jurusan</h1>
    <form action="/admin/jurusan/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" id="">
        </div>
    <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="description" cols="160" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection

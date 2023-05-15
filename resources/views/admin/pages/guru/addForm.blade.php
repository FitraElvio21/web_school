@extends('admin.main')

@section('title')
    Tambah data Guru
@endsection

@section('content')
    <h1>Tambah Data Guru</h1>
    <form action="/admin/guru/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">NIP</label><br>
            <input type="text" name="nip" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Nama</label><br>
            <input type="text" name="nama" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection

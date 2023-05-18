@extends('admin.main')

@section('title')
    Tambah data Golongan
@endsection

@section('content')
    <h1>Tambah Data Golongan</h1>
    <form action="/admin/golongan/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Golongan</label>
            <input type="text" name="golongan" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Tanggal Buka</label>
            <input type="date" name="tanggal_buka" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Tanggal_tutup</label>
            <input type="date" name="tanggal_tutup" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection

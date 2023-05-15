@extends('admin.main')

@section('title')
    Ubah data Guru
@endsection

@section('content')
    <h1>Ubah Data Guru</h1>
    <form action="/admin/guru/update/{{ $guru['nip'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama</label><br>
            <input type="text" name="nama" class="form-control" id="" value="{{ $guru['nama'] }}">
        </div>
        <div class="form-group">
            <label for="">NIP</label><br>
            <input type="text" name="nip" class="form-control" id="" value="{{ $guru['nip'] }}">
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

@extends('admin.main')

@section('title')
    Ubah data Organisasi
@endsection

@section('content')
    <h1>Ubah Data Organisasi</h1>
    <form action="/admin/organisasi/update/{{ $organisasi['id_organisasi'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">organisasi</label>
            <input type="text" name="organisasi" class="form-control" id="" value="{{ $organisasi['organisasi'] }}">
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" class="summernote" cols="161" rows="5">{{ $organisasi['deskripsi'] }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

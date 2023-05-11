@extends('admin.main')

@section('title')
    Ubah data profile
@endsection

@section('content')
    <h1>Ubah Data profile</h1>
    <form action="/admin/profile/update/{{ $profile['id_profile'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" id="" value="{{ $profile['judul'] }}">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="summernote" cols="160" rows="5">{{ $profile['description'] }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

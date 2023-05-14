@extends('admin.main')

@section('title')
    Ubah data Jurusan
@endsection

@section('content')
    <h1>Ubah Data Jurusan</h1>
    <form action="/admin/jurusan/update/{{ $jurusan['id_jurusan'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" id="" value="{{ $jurusan['jurusan'] }}">
        </div>
        <div class="form-group">
            <label for="">Description</label><br>
            <textarea name="description" class="summernote" cols="186" rows="5">{{ $jurusan['description'] }}</textarea>

        </div>
        <div class="form-group">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

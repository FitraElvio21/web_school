@extends('admin.main')

@section('title')
    Ubah data Carousel
@endsection

@section('content')
    <h1>Ubah Data Carousel</h1>
    <form action="/admin/carousel/update/{{ $carousel['id_carousel'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" id="" value="{{ $carousel['judul'] }}">
        </div>
        <div class="form-group">
            <label for="">description</label><br>
            <textarea name="description" id="description" cols="161" rows="5">{{ $carousel['description'] }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

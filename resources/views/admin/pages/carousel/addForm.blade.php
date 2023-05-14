@extends('admin.main')

@section('title')
    Tambah data Carousel
@endsection

@section('content')
    <h1>Tambah Data Carousel</h1>
    <form action="/admin/carousel/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">description</label><br>
            <textarea name="description" id="description" cols="161" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection

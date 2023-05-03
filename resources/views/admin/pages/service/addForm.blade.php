@extends('admin.main')

@section('title')
    Tambah data service
@endsection

@section('content')
    <h1>Tambah Data Service</h1>
    <form action="/admin/service/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="description" cols="160" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="">Icon</label>
            <input type="file" name="icon" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection

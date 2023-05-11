@extends('admin.main')

@section('title')
    Ubah data service
@endsection

@section('content')
    <h1>Ubah Data Service</h1>
    <form action="/admin/service/update{{ $service['id_service'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" id="" value="{{ $service['title'] }}">
        </div>
        <div class="form-group">
            <label for="">Description</label><br>
            <textarea name="description" id="description" cols="186" rows="5">{{ $service['description'] }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Icon</label>
            <input type="file" name="icon" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

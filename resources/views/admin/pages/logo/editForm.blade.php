@extends('admin.main')

@section('title')
    Ubah data Logo
@endsection

@section('content')
    <h1>Ubah Data Logo</h1>
    <form action="/admin/logo/update/{{ $logo['id_logo'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" id="" value="{{ $logo['nama'] }}">
        </div>
        <div class="form-group">
            <label for="">Logo</label>
            <input type="file" name="logo" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

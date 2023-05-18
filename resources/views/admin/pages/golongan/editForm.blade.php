@extends('admin.main')

@section('title')
    Ubah data Golongan
@endsection

@section('content')
    <h1>Ubah Data Golongan</h1>
    <form action="/admin/golongan/update/{{ $golongan['id_golongan'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Golongan</label>
            <input type="text" name="golongan" class="form-control" id="" value="{{ $golongan['golongan'] }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal Buka</label>
            <input type="date" name="tanggal_buka" class="form-control" id="" value="{{ $golongan['tanggal_buka'] }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal tutup</label>
            <input type="date" name="tanggal_tutup" class="form-control" id="" value="{{ $golongan['tanggal_tutup'] }}">
        </div>

        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

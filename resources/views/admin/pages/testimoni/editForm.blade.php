@extends('admin.main')

@section('title')
    Ubah data Testimoni
@endsection

@section('content')
    <h1>Ubah Data Testimoni</h1>
    <form action="/admin/testimoni/update{{ $testimoni['id_testimoni'] }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" id="" value="{{ $testimoni['nama'] }}">
        </div>
        <div class="form-group">
            <label for="">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" id="" value="{{ $testimoni['pekerjaan'] }}">
        </div>
        <div class="form-group">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Pesan</label>
            <input type="text" name="pesan" class="form-control" id="" value="{{ $testimoni['pesan'] }}">
        </div>
        <button type="submit" class="btn btn-success">Ubahkan</button>
    </form>
@endsection

@extends('admin.main')

@section('title')
    Detail Berita
@endsection

@section('content')
    <h2>{{ $data->judul }}</h2>
    <h5>{{ $data->author }}</h5>
    <h5>{{ $data->tanggal_post }}</h5>
    <img src="{{ '/images/berita/' . $data->gambar }}" alt="{{ $data->gambar }}" width="300" height="200">
    <p><?= $data->isi?></p>
@endsection

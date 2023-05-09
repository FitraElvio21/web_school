@extends('admin.main')

@section('title')
    Detail Berita
@endsection

@section('content')
    <h1>{{ $data->judul }}</h1>
    <h5>{{ $data->author }}</h5>
    <h5>{{ $data->tanggal_post }}</h5>
    <img src="{{ '/images/berita/' . $data->gambar }}" alt="{{ $data->gambar }}" width="500" height="500">
    <p>{{ $data->isi }}</p>
@endsection

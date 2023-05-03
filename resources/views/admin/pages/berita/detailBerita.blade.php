@extends('admin.main')

@section('title')
    Detail Berita
@endsection

@section('content')
    <img src="{{ '/images/berita/' . $data->gambar }}" alt="{{ $data->gambar }}" width="500" height="500">
    <h1>{{ $data->judul }}</h1>
    <p>{{ $data->isi }}</p>
@endsection

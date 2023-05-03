@extends('admin.main')

@section('title')
    Detail Prestasi
@endsection
@section('content')
    <img src="{{ '/images/prestasi/' . $data->gambar }}" alt="{{ $data->gambar }}" width="500" height="300">
    <h1>{{ $data->judul }}</h1>
    <p>{{ $data->tanggal_post }}</p>
    <p>{{ $data->author }}</p>
    <p>{{ $data->description }}</p>
@endsection

@extends('admin.main')
@section('title')
    Detail Profile
@endsection
@section('content')
    <img src="{{ '/images/profile/' . $data->gambar }}" alt="{{ $data->gambar }}" width="500" height="300" >
    <h1>{{ $data->judul }}</h1>
    <p>{{ $data->description }}</p>
@endsection

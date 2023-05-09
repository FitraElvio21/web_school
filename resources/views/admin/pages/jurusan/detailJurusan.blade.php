@extends('admin.main')

@section('title')
    Detail Jurusan
@endsection

@section('content')
    <img src="{{ '/images/jurusan/' . $data->foto }}" alt="{{ $data->foto }}" width="250" height="250">
    <h1>{{ $data->jurusan }}</h1>
    <p>{{ $data->description }}</p>
@endsection

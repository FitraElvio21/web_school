@extends('admin.main')

@section('title')
    Detail About
@endsection

@section('content')
    <img src="{{ '/images/about/' . $data->gambar }}" alt="{{ $data->gambar }}" width="500" height="300">
    <h1>{{ $data->judul }}</h1>
    <p><?= $data->description?></p>
    <h1>Visi</h1>
    <p><?= $data->visi?></p>
    <h1>Misi</h1>
    <p><?= $data->misi?></p>
@endsection

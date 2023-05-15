@extends('admin.main')

@section('title')
    Detail Organisasi
@endsection

@section('content')
    <img src="{{ '/images/organisasi/' . $data->gambar }}" alt="{{ $data->gambar }}" width="300" >
    <h2><?= $data->organisasi ?></h2>
    <p><?= $data->deskripsi ?></p>
@endsection

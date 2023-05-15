@extends('admin.main')

@section('title')
    Detail About
@endsection

@section('content')
    <img src="{{ '/images/about/' . $data->gambar }}" alt="{{ $data->gambar }}" width="450" height="300"><br><br>
    <p><?= $data->description?></p>
    <p><?= $data->visi?></p>
    <p><?= $data->misi?></p>
    <p><?= $data->map_embed ?></p>
    <p><?= $data->small_map_embed ?></p>

@endsection

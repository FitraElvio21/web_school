@extends('admin.main')

@section('title')
    About
@endsection

@section('content')

    <h1>
        About
    </h1>
    <a href="{{ '/admin/about/edit-form/' . $data->id_about }}" class="btn btn-warning"><i
        class="pe-7s-pen" style="font-size:14px;"></i> Edit</a>
    <a href="{{ '/admin/about/detail-about/' . $data->id_about }}" class="btn btn-primary"><i
        class="pe-7s-info" style="font-size:14px;"></i> Info Detail</a>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <h3>Judul</h3>
                    {{ $data->judul }}
                    <hr>

                    <h3>Description</h3>
                    <?= substr($data->description, 0, 90) . '...' ?>
                    <hr>

                </div>
                <div class="col-md-5">
                    <h3>Gambar</h3>
                    <img src="{{ '/images/about/' . $data->gambar }}" alt="{{ $data->gambar }}" width="150" height="150">
                    <hr>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">

                    <?= substr($data->visi, 0, 70) . '...' ?>
                    <hr>

                    <?= substr($data->misi, 0, 70) . '...' ?>
                    <hr>

                    <h3>Small Map</h3>
                    <?= $data->small_map_embed ?>
                    <hr>
                </div>
                <div class="col-md-5">
                    <h3>Map</h3>
                    <?= $data->map_embed ?>
                    <hr>
                </div>
            </div>



        </div>
    </div>
@endsection

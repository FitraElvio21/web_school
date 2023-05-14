@extends('admin.main')

@section('title')
    Carousel
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/carousel/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Desciption</th>
                        <th>gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->description }}</td>
                            <td><img src="{{ '/images/carousel/' . $item->gambar }}" alt="{{ $item->gambar }}" width="150"
                                    height="150">
                            </td>
                            <td>
                                <a href="{{ '/admin/carousel/edit-form/' . $item->id_carousel }}" class="btn btn-warning"><i
                                        class="pe-7s-pen" style="font-size:20px;"></i></a>
                                <form action="{{ '/admin/carousel/delete/' . $item->id_carousel }}" method="post"
                                    onsubmit="return confirm('Apakah anda yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="pe-7s-trash"
                                            style="font-size:20px;"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

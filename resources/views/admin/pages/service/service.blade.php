@extends('admin.main')

@section('title')
    service
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/service/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td><img src="{{ '/images/service/' . $item->icon }}" alt="{{ $item->icon }}" width="150"
                                height="150"></td>
                            <td>
                                <a href="{{ '/admin/service/edit-form/' . $item->id_service }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:20px;"></i></a>
                                <form action="{{ '/admin/service/delete/' . $item->id_service }}" method="post"
                                    onsubmit="return confirm('Apakah anda yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="pe-7s-trash" style="font-size:20px;"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('admin.main')

@section('title')
    Golongan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/golongan/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Golongan</th>
                        <th>Tanggal Buka</th>
                        <th>Tanggal Tutup</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->tanggal_buka }}</td>
                            <td>{{ $item->tanggal_tutup }}</td>
                            <td>
                                <a href="{{ '/admin/golongan/edit-form/' . $item->id_golongan }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:14px;"></i>Edit</a>
                                <form action="{{ '/admin/golongan/delete/' . $item->id_golongan }}" method="post"
                                    onsubmit="return confirm('Apakah anda yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="pe-7s-trash" style="font-size:14px;"></i>Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

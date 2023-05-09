@extends('admin.main')

@section('title')
    Organisasi
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/organisasi/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Organisasi</th>
                        <th>Deskripsi</th>
                        <th>gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->organisasi }}</td>
                            <td>
                                <?= substr($item->deskripsi,0,100)."..."?>
                                <a href="{{ '/admin/organisasi/detail-organisasi/' . $item->id_organisasi }}">Lihat Selengkapnya</a>
                            </td>
                            <td><img src="{{ '/images/organisasi/' . $item->gambar }}" alt="{{ $item->gambar }}" width="150"
                                height="150"></td>
                            <td>
                                <a href="{{ '/admin/organisasi/edit-form/' . $item->id_organisasi }}" class="btn btn-warning">Edit</a>
                                <form action="{{ '/admin/organisasi/delete/' . $item->id_organisasi }}" method="post"
                                    onsubmit="return confirm('Apakah anda yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

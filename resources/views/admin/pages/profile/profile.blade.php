@extends('admin.main')

@section('title')
    profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/profile/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ '/images/profile/' . $item->gambar }}" alt="{{ $item->gambar }}" width="150"
                                    height="150"></td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                 <?= substr($item->description,0,50)."..."?>
                                <a href="{{ '/admin/profile/detail-profile/' . $item->id_profile }}">Lihat Selengkapnya</a>
                            </td>
                            <td>
                                <a href="{{ '/admin/profile/edit-form/' . $item->id_profile }}"
                                    class="btn btn-warning"><i class="pe-7s-pen" style="font-size:20px;"></i></a>
                                <form action="{{ '/admin/profile/delete/' . $item->id_profile }}" method="post"
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

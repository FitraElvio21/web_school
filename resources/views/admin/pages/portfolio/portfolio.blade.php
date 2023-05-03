@extends('admin.main')

@section('title')
    Portfolio
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/portfolio/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Tempat</th>
                        <th>Tanggal Post</th>
                        <th>Author</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_tempat }}</td>
                            <td>{{ $item->tanggal_post }}</td>
                            <td>{{ $item->author }}</td>
                            <td><img src="{{ '/images/portfolio/' . $item->gambar }}" alt="{{ $item->gambar }}" width="150"
                                height="150"></td>
                            <td>
                                <a href="{{ '/admin/portfolio/edit-form/' . $item->id_portfolio }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:20px;"></i></a>
                                <form action="{{ '/admin/portfolio/delete/' . $item->id_portfolio }}" method="post"
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

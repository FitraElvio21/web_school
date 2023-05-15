@extends('admin.main')

@section('title')
    Guru
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/guru/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td><img src="{{ '/images/guru/' . $item->gambar }}" alt="{{ $item->gambar }}" width="150"
                                    height="150">
                            </td>
                            <td>
                                <a href="{{ '/admin/guru/edit-form/' . $item->nip }}" class="btn btn-warning"><i
                                        class="pe-7s-pen" style="font-size:20px;"></i></a>
                                <form action="{{ '/admin/guru/delete/' . $item->nip }}" method="post"
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

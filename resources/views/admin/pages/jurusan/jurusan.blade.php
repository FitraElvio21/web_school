@extends('admin.main')

@section('title')
    Jurusan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/jurusan/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jurusan</th>
                        <th>Description</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>
                                <?= substr($item->description,0,100)."..."?>
                                <a href="{{ '/admin/jurusan/detail-jurusan/' . $item->id_jurusan }}">Lihat Selengkapnya</a>
                            </td>
                            <td><img src="{{ '/images/jurusan/' . $item->foto }}" alt="{{ $item->foto }}" width="150"
                                height="150"></td>
                            <td>
                                <a href="{{ '/admin/jurusan/edit-form/' . $item->id_jurusan }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:14px;"></i>Edit</a>
                                <form action="{{ '/admin/jurusan/delete/' . $item->id_jurusan }}" method="post"
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

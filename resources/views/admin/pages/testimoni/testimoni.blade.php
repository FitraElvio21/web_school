@extends('admin.main')

@section('title')
    Testimoni
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/testimoni/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Pekerjaan</th>
                        <th>Foto</th>
                        <th>Pesan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td><img src="{{ '/images/testimoni/' . $item->foto }}" alt="{{ $item->foto }}" width="150"
                                height="150"></td>
                            <td>{{ $item->pesan }}</td>
                            <td>
                                <a href="{{ '/admin/testimoni/edit-form/' . $item->id_testimoni }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:14px;"></i>Edit</a>
                                <form action="{{ '/admin/testimoni/delete/' . $item->id_testimoni }}" method="post"
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

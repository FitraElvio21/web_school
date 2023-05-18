@extends('admin.main')

@section('title')
    Pendaftaran Siswa
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/pendaftaran_siswa/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Jenis kelamin</th>
                        <th>Pass Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_depan }}</td>
                            <td>{{ $item->nama_belakang }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td><img src="{{ '/images/pendaftaran_siswa/' . $item->pass_foto }}" alt="{{ $item->pass_foto }}" width="150"
                                height="150"></td>
                            <td>
                                <a href="{{ '/admin/pendaftaran_siswa/edit-form/' . $item->nisn }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:14px;"></i>Edit</a>
                                <form action="{{ '/admin/pendaftaran_siswa/delete/' . $item->nisn }}" method="post"
                                    onsubmit="return confirm('Apakah anda yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="pe-7s-trash" style="font-size:14px;"></i>Delete</button>
                                    <a href="{{ '/admin/pendaftaran_siswa/detail/' . $item->nisn }}" class="btn btn-primary"><i
                                        class="pe-7s-info" style="font-size:14px;"></i> Info Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

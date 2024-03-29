@extends('admin.main')

@section('title')
    Pesan
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Email</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_depan }}</td>
                            <td>{{ $item->nama_belakang }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->pesan }}</td>
                            <td>
                                <form action="{{ '/admin/pesan/delete/' . $item->id_pesan }}" method="post"
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

@extends('admin.main')

@section('title')
    Berita
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/berita/create-form" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Tanggal Post</th>
                        <th>Author</th>
                        <th>isi</th>
                        <th>gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->tanggal_post }}</td>
                            <td>{{ $item->author }}</td>
                            <td>
                                <?= substr($item->isi,0,100)."..."?>
                                <a href="{{ '/admin/berita/detail-berita/' . $item->id_berita }}">Lihat Selengkapnya</a>
                            </td>
                            <td><img src="{{ '/images/berita/' . $item->gambar }}" alt="{{ $item->gambar }}" width="150"
                                height="150"></td>
                            <td>
                                <a href="{{ '/admin/berita/edit-form/' . $item->id_berita }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:20px;"></i></a>
                                <form action="{{ '/admin/berita/delete/' . $item->id_berita }}" method="post"
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

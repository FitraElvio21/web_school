@extends('admin.main')

@section('title')
    profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
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
                                    class="btn btn-warning"><i class="pe-7s-pen" style="font-size:14px;"></i>Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

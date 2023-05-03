@extends('admin.main')

@section('title')
    About
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Description</th>
                        <th>Gambar</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $data->judul }}</td>
                            <td>
                                <?= substr($data->description, 0, 50) . '...' ?>
                                <a href="{{ '/admin/about/detail-about/' . $data->id_about }}">Lihat Selengkapnya</a>
                            </td>
                            <td><img src="{{ '/images/about/' . $data->gambar }}" alt="{{ $data->gambar }}" width="150"
                                    height="150"></td>
                                    <td>
                                        <?= substr($data->visi, 0, 50) . '...' ?>
                                        <a href="{{ '/admin/about/detail-about/' . $data->id_about }}">Lihat Selengkapnya</a>
                                    </td>
                                    <td>
                                        <?= substr($data->misi, 0, 50) . '...' ?>
                                        <a href="{{ '/admin/about/detail-about/' . $data->id_about }}">Lihat Selengkapnya</a>
                                    </td>
                            <td>
                                <a href="{{ '/admin/about/edit-form/' . $data->id_about }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:20px;"></i></a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

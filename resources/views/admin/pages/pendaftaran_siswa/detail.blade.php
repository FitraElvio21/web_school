@extends('admin.main')

@section('title')
Detail Pendaftaran Siswa
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
                    <th>Jenis kelamin</th>
                    <th>Alamat</th>
                    <th>Pass Foto</th>
                    <th>Nama Ayah</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Penghasilan Ayah Perbulan</th>
                    <th>Nama Ibu</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Penghasilan Ibu Perbulan</th>
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
                        <td>{{ $item->alamat }}</td>
                        <td><img src="{{ '/images/pendaftaran_siswa/' . $item->pass_foto }}" alt="{{ $item->pass_foto }}" width="150"
                            height="150">
                        </td>
                        <td>{{ $item->nama_ayah }}</td>
                        <td>{{ $item->pekerjaan_ayah }}</td>
                        <td>{{ $item->penghasilan_ayah_perbulan }}</td>
                        <td>{{ $item->nama_ibu }}</td>
                        <td>{{ $item->pekerjaan_ibu }}</td>
                        <td>{{ $item->penghasilan_ibu_perbulan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

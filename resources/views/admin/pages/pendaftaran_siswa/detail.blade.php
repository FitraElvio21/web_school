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
                    {{-- <th>#</th> --}}
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
                {{-- @foreach ($data as $item) --}}
                    {{-- @dd($item) --}}
                    <tr>
                        <td>{{ $data->nama_depan }}</td>
                        <td>{{ $data->nama_belakang }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td><img src="{{ '/images/pendaftaran_siswa/' . $data->pass_foto }}" alt="{{ $data->pass_foto }}" width="150"
                            height="150">
                        </td>
                        <td>{{ $data->nama_ayah }}</td>
                        <td>{{ $data->pekerjaan_ayah }}</td>
                        <td>{{ $data->penghasilan_ayah_perbulan }}</td>
                        <td>{{ $data->nama_ibu }}</td>
                        <td>{{ $data->pekerjaan_ibu }}</td>
                        <td>{{ $data->penghasilan_ibu_perbulan }}</td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection

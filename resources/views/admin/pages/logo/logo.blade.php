@extends('admin.main')

@section('title')
    Logo
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $data->nama }}</td>
                            <td><img src="{{ '/images/logo/' . $data->logo }}" alt="{{ $data->logo }}" width="150"
                                height="150"></td>
                            <td>
                                <a href="{{ '/admin/logo/edit-form/' . $data->id_logo }}" class="btn btn-warning"><i class="pe-7s-pen" style="font-size:20px;"></i></a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

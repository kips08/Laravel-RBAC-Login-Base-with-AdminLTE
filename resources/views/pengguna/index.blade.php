@extends('adminlte::page')

@section('title', 'Data Pengguna')

@section('content_header')
    <h1>Data Pengguna</h1>
@stop

@section('content')\
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Alamat Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>
                                        @can('pengguna.lihat')<button type="button" class="btn btn-primary">View</button>@endcan
                                        <button type="button" class="btn btn-warning">Reset Sandi</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
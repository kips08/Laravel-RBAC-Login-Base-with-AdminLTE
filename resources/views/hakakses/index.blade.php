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
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hakakses as $h)
                                <tr>
                                    <td>{{$h->name}}</td>
                                    <td>
                                        
                                        <button type="button" class="btn btn-info">Hak Akses</button>
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
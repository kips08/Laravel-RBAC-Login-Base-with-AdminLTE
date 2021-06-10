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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $r)
                                <tr>
                                    <td>{{$r->name}}</td>
                                    <td>
                                        <form action="{{route('rbac.peran.delete', $r->name)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('rbac.peran.view', $r->name)}}" class="btn btn-info">Hak Akses</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Peran/Role ini?')">Hapus</button>
                                        </form>
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
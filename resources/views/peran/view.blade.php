@extends('adminlte::page')

@section('title', 'Data Pengguna')

@section('content_header')
    <h1>{{strtoupper($role->name)}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('rbac.peran.update', $role->name)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <h5>Hak Akses</h5>
                    <hr>
                    @foreach ($tree as $group => $list)
                        <h6 class="font-weight-bold">{{strtoupper($group)}}</h6>
                        @foreach ($list as $l)
                            @if($role->hasPermissionTo($l->name))
                                <div class="form-check">
                                    <input class="form-check-input" name="checkHakakses[]" type="checkbox" value="{{$l->name}}" id="check{{$l->name}}" checked>
                                    <label class="form-check-label" for="check{{$l->name}}">
                                        {{$l->name}}
                                    </label>
                                </div>
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" name="checkHakakses[]" type="checkbox" value="{{$l->name}}" id="check{{$l->name}}">
                                    <label class="form-check-label" for="check{{$l->name}}">
                                        {{$l->name}}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <hr>                        
                    @endforeach
                    <div class="text-center">
                        <button name="btnSimpan" class="btn btn-success" type="submit">Simpan</button>
                        <a name="btnKembali" class="btn btn-danger" href="{{route('rbac.peran.index')}}" role="button">Kembali</a>
                    </div>
                    </form>
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
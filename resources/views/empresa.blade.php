@extends('adminlte::page')

@section('title', 'Empresas')

@php
$empresa = session('empresa');
if ($empresa == '') {
    session()->forget('empresa');
}
@endphp

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Seleccione una empresa</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Seleccione una empresa</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nombre de la empresa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'consolidado.index', 'method' => 'GET']) !!}
                <div class="card-body">
                <div class="form-group">
                    <label for="business">ESS Solutions</label>
                    <input type="hidden" id="business" name="business" class="form-control" value="1">
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn bg-gradient-success">Enviar</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nombre de la empresa</h3>
            </div>
            <!-- /.card-header -->

            {!! Form::open(['route' => 'consolidado.index', 'method' => 'GET']) !!}
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Telcos</label>
                    <input type="hidden" id="business" name="business" class="form-control" value="2">
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn bg-gradient-primary">Enviar</button>
                </div>
            {!! Form::close() !!}
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


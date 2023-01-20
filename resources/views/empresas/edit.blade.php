@extends('adminlte::page')

@section('title', 'Actualización de empresa')

@section('css')
<style type="text/css">
    .unstyled-button{
        border: none;
        background: none;
        color: #007bff;
    }
</style>
@stop

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Actualización de empresa</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('empresas.index') }}">Empresas</a></li>
            <li class="breadcrumb-item active">Actualización de empresa</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">

        </div>
        <div>
            {!! Form::model($empresa, ['route' => ['empresas.update', $empresa], 'method' => 'PUT']) !!}
            <div class="form-group mt-4">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $empresa->name }}" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descripción" required>{{ $empresa->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
            <a href="{{route('empresas.index')}}" class="btn btn-secondary">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop



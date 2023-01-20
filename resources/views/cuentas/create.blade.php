@extends('adminlte::page')

@section('title', 'Registro de Cuenta Bancaria')

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
            <h1>Registro de Cuenta Bancaria</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('cuentas.index') }}">Cuentas Bancarias</a></li>
            <li class="breadcrumb-item active">Registro de Cuenta Bancaria</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@php
    $business = session('business');
@endphp

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
            {!! Form::open(['route' => 'cuentas.store', 'method' => 'POST']) !!}
            <div class="form-group mt-4">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descripción" required></textarea>
            </div>
            <div class="form-group">
                <label for="account_number">Número de cuenta</label>
                <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Número de cuenta" required>
            </div>
            <div class="form-group">
                <label for="amount">Importe</label>
                <input type="number" class="form-control" name="amount" id="amount" placeholder="Importe" required>
            </div>

            <div>
                <input type="hidden" name="empresa_id" id="empresa_id" value="{{ $business }}">
                <input type="hidden" name="user_id" id="user_id" value="1">
                <input type="hidden" name="month" id="month" value="{{ $mes }}">
                <input type="hidden" name="year" id="year" value="{{ $ano }}">
            </div>

            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
            <a href="{{route('cuentas.index')}}" class="btn btn-secondary">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop


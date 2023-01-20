@extends('adminlte::page')

@section('title', 'Actualización de Cuenta por Pagar')

@section('css')
<style type="text/css">
    .unstyled-button{
        border: none;
        background: none;
        color: #007bff;
    }
</style>
@stop

@php
    $business = session('business');
@endphp

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('pagos.index') }}">Cuentas por Pagar</a></li>
            <li class="breadcrumb-item active">Actualización de Cuenta por Pagar</li>
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
            <h3 class="card-title">Actualización de Cuenta por Pagar</h3>
        </div>
        <div>
            {!! Form::model($pago, ['route' => ['pagos.update', $pago], 'method' => 'PUT']) !!}
            <div class="form-group mt-4">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $pago->name }}" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descripción" required>{{ $pago->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="amount">Importe</label>
                <input type="number" class="form-control" name="amount" id="amount" value="{{ $pago->amount }}" placeholder="Importe" required></textarea>
            </div>

            <div>
                <input type="hidden" name="empresa_id" id="empresa_id" value="{{ $business }}">
                <input type="hidden" name="user_id" id="user_id" value="1">
            </div>

            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
            <a href="{{route('pagos.index')}}" class="btn btn-secondary">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop



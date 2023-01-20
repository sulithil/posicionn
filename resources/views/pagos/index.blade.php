@extends('adminlte::page')

@section('title', 'Listado de Cuentas por Pagar')

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
            <h1>Listado de Cuentas por Pagar</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Cuentas por Pagar</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div></div>
            <div class="btn-group dropleft float-left">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('pagos.create')}}">Agregar</a>
                </div>
              </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablacuentasporpagar" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Importe</th>
          <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pagos as $pago)
        <tr>
            <th>{{ $pago->id }}</th>
            <td><a href="{{ route('pagos.show', $pago) }}">{{ $pago->name }}</a></td>
            <td>{{ $pago->description }}</td>
            <td>$ {{ number_format($pago->amount, 2) }}</td>
            <td>
                {!! Form::open(['route' => ['pagos.destroy', $pago], 'method' => 'DELETE']) !!}

                <a href="{{ route('pagos.edit', $pago) }}" class="p-2" title="Actualizar">
                    <span class="h4"><i class="fas fa-pen-square"></i></span>
                </a>

                <button href="" class="unstyled-button p-2" title='Borrar'>
                    <span class="h4"><i class="fas fa-minus-square"></i></i></span>
                </button>
                {!! Form::close() !!}
            </td>
        </tr>

        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Importe</th>
            <th>Acción</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
</div>
</div>
@stop

@section('css')
@stop

@section('js')
<script>
    $(function () {
        $("#tablacuentasporpagar").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tablacuentasporpagar_wrapper .col-md-6:eq(0)');
    });
</script>
@stop

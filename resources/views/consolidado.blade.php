@extends('adminlte::page')

@section('title', 'Consolidado')

@section('content_header')

@if ($business == 1)
    @php
    $namebusiness = 'ESS Solutions'
    @endphp
@elseif ($business == 2)
    @php
    $namebusiness = 'Telcos'
    @endphp
@endif

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Posición Consolidado {{$namebusiness}}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Posición Consolidado</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@php
$totalcuentas = 0; $totaldiferidos = 0; $totalposicion = 0; $totalpagos = 0; $totalcobros = 0; $totalcreditos = 0;
@endphp

@foreach ($pagos as $pago)
@php
    $totalpagos = $totalpagos + $pago->amount;
@endphp
@endforeach

@foreach ($cobros as $cobro)
@php
    $totalcobros = $totalcobros + $cobro->amount;
@endphp
@endforeach

@foreach ($creditos as $credito)
@php
    $totalcreditos = $totalcreditos + $credito->amount;
@endphp
@endforeach

@section('content')
    <div class="content-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table id="tablaconsolidado" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem">
                                    <th colspan="12">Cuentas bancarias</th>
                                </tr>
                                <tr>
                                    <th colspan="4">Cuenta</th>
                                    <th colspan="5">N° de cuenta</th>
                                    <th colspan="3">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuentas as $cuenta)
                                    <tr>
                                        <td colspan="4">{{ $cuenta->name }}</td>
                                        <td colspan="5">{{ $cuenta->account_number }}</td>
                                        <td colspan="3">$ {{ number_format($cuenta->amount, 2) }}</td>
                                    </tr>
                                    @php
                                        $totalcuentas = $totalcuentas + $cuenta->amount;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr style="background-color: #68BD65; color:white; font-size:1.2rem; font-weight: bold">
                                    <td colspan="9">Total cuentas bancarias</td>
                                    <td colspan="3">$ {{ number_format($totalcuentas, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-weight: bold">
                                    <td colspan="12">Diferidos</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Nombre del diferido</th>
                                    <th colspan="5">Descripción del diferido</th>
                                    <th colspan="3">Importe</th>
                                </tr>
                                @foreach ($diferidos as $diferido)
                                    <tr>
                                        <td colspan="4">{{ $diferido->name }}</td>
                                        <td colspan="5">{{ $diferido->description }}</td>
                                        <td colspan="3">$ {{ number_format($diferido->amount, 2) }}</td>
                                    </tr>
                                    @php
                                        $totaldiferidos = $totaldiferidos + $diferido->amount;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr style="background-color: #ad5f5f; color:white; font-size:1.2rem; font-weight: bold">
                                    <td colspan="9">Total diferidos</td>
                                    <td colspan="3">$ {{ number_format($totaldiferidos, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr style="background-color: #3dc438; color:white; font-size:1.5rem; font-weight: bold">
                                    <td colspan="9">Total posición</td>
                                    @php
                                        $totalposicion = $totalcuentas - $totaldiferidos;
                                    @endphp
                                    <td colspan="3">$ {{ number_format($totalposicion, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-size:1.2rem; font-weight: bold">
                                    <td colspan="12">Liquidez</td>
                                </tr>
                                <tr>
                                    <th colspan="2"></th>
                                    <th colspan="2">Saldos</th>
                                    <th colspan="2">Cuentas por pagar</th>
                                    <th colspan="2">Cuentas por cobrar</th>
                                    <th colspan="2">Creditos fiscales</th>
                                    <th colspan="2">Disponible</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Montos</th>
                                    <td colspan="2">{{ number_format($totalposicion, 2) }}</td>
                                    <td colspan="2">{{ number_format($totalpagos, 2) }}</td>
                                    <td colspan="2">{{ number_format($totalcobros, 2) }}</td>
                                    <td colspan="2">{{ number_format($totalcreditos, 2) }}</td>
                                    <td colspan="2">{{ number_format(($totalposicion + $totalcobros + $totalcreditos) - $totalpagos, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-size:1.2rem; font-weight: bold">
                                    <td colspan="12">Cuentas por pagar</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Concepto</th>
                                    <th colspan="5">Descripción</th>
                                    <th colspan="3">Importe</th>
                                </tr>

                                @foreach ($pagos as $pago)
                                    <tr>
                                        <td colspan="4">{{ $pago->name }}</td>
                                        <td colspan="5">{{ $pago->description }}</td>
                                        <td colspan="3">$ {{ number_format($pago->amount, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-weight: bold;">
                                    <td colspan="9">Total cuentas por pagar</td>
                                    <td colspan="3">$ {{ number_format($totalpagos, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-size:1.2rem; font-weight: bold">
                                    <td colspan="12">Cuentas por cobrar</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Concepto</th>
                                    <th colspan="5">Descripción</th>
                                    <th colspan="3">Importe</th>
                                </tr>
                                @foreach ($cobros as $cobro)
                                    <tr>
                                        <td colspan="4">{{ $cobro->name }}</td>
                                        <td colspan="5">{{ $cobro->description }}</td>
                                        <td colspan="3">$ {{ number_format($cobro->amount, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-weight: bold">
                                    <td colspan="9">Total cuentas por cobrar</td>
                                    <td colspan="3">$ {{ number_format($totalcobros, 2) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table><!--table-->
                        {{-- <table id="tablaconsolidado" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table> --}}
                        <div class="d-flex justify-content-end mb-4">
                            <a class="btn btn-primary" href="#">Exportar a PDF</a>
                        </div>
                    </div><!--card-body-->
                </div><!--card-->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div> <!--Content wrapper-->
@stop

@section('css')
@stop

@section('js')
<script>
    $(function () {
        $("#tablaconsolidado").DataTable({
          "responsive": true, "lengtdChange": false, "autoWidtd": false,
          "buttons": ["pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tablaconsolidado_wrapper .col-md-6:eq(0)');
    });
</script>
@stop

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

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'consolidados.cierre', 'method' => 'POST']) !!}
                        <table id="tablacuentas" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem">
                                    <th colspan="6">Cuentas bancarias</th>
                                </tr>
                                <tr>
                                    <th colspan="">Cuenta</th>
                                    <th colspan="">N° de cuenta</th>
                                    <th colspan="">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuentas as $cuenta)
                                    <tr>
                                        <td colspan=""><input type="hidden" name="account_name[]" id="account_name[]" value="{{ $cuenta->name }}">{{ $cuenta->name }}</td>
                                        <td colspan=""><input type="hidden" name="account_number[]" id="account_number[]" value="{{ $cuenta->account_number }}">{{ $cuenta->account_number }}</td>
                                        <td colspan=""><input type="hidden" name="amount[]" id="amount[]" value="{{ $cuenta->amount }}">$ {{ number_format($cuenta->amount, 2) }}</td>
                                        <input type="hidden" name="account_id[]" id="account_id[]" value="{{ $cuenta->id }}">
                                        <input type="hidden" name="tipocb[]" id="tipocb[]" value="CB">
                                    </tr>
                                    @php
                                        $totalcuentas = $totalcuentas + $cuenta->amount;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #68BD65; color:white; font-size:1.2rem;">
                                    <th colspan="">Total cuentas bancarias</th>
                                    <th></th>
                                    <th colspan="">$ {{ number_format($totalcuentas, 2) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- tabla cuentas-->

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table id="tabladiferidos" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-weight: bold">
                                    <td colspan="12">Diferidos</td>
                                </tr>
                                <tr>
                                    <th colspan="">Nombre del diferido</th>
                                    <th colspan="">Descripción del diferido</th>
                                    <th colspan="">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diferidos as $diferido)
                                    <tr>
                                        <td colspan=""><input type="hidden" name="dif_name[]" id="dif_name[]" value="{{ $diferido->name }}">{{ $diferido->name }}</td>
                                        <td colspan=""><input type="hidden" name="dif_description[]" id="dif_description[]" value="{{ $diferido->description }}">{{ $diferido->description }}</td>
                                        <td colspan=""><input type="hidden" name="dif_amount[]" id="dif_amount[]" value="{{ $diferido->amount }}">$ {{ number_format($diferido->amount, 2) }}</td>
                                        <input type="hidden" name="dif_id[]" id="dif_id[]" value="{{ $diferido->id }}">
                                        <input type="hidden" name="tipodif[]" id="tipodif[]" value="DIF">
                                    </tr>
                                    @php
                                        $totaldiferidos = $totaldiferidos + $diferido->amount;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #ad5f5f; color:white; font-size:1.2rem;">
                                    <th colspan="">Total diferidos</th>
                                    <th></th>
                                    <th colspan="">$ {{ number_format($totaldiferidos, 2) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- tabla diferidos-->
        </div><!-- row posicion -->

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table id="tablatotalposicion" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr style="background-color: #68BD65; color:white; font-size:1.5rem; ">
                                    <th colspan="9">Total posición</th>
                                    @php
                                        $totalposicion = $totalcuentas - $totaldiferidos;
                                    @endphp
                                    <th colspan="3">$ {{ number_format($totalposicion, 2) }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- row total posicion-->

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table id="tablaliquidez" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-size:1.2rem">
                                    <th colspan="12">Liquidez</th>
                                </tr>
                                <tr>
                                    <th colspan=""></th>
                                    <th colspan="">Saldos</th>
                                    <th colspan="">Cuentas por pagar</th>
                                    <th colspan="">Cuentas por cobrar</th>
                                    <th colspan="">Creditos fiscales</th>
                                    <th colspan="">Disponible</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="">Montos</th>
                                    <td colspan="">{{ number_format($totalposicion, 2) }}</td>
                                    <td colspan="">{{ number_format($totalpagos, 2) }}</td>
                                    <td colspan="">{{ number_format($totalcobros, 2) }}</td>
                                    <td colspan="">{{ number_format($totalcreditos, 2) }}</td>
                                    <td colspan="">{{ number_format(($totalposicion + $totalcobros + $totalcreditos) - $totalpagos, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- row liquidez -->

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table id="tablapagos" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-size:1.2rem">
                                    <th colspan="6">Cuentas por pagar</th>
                                </tr>
                                <tr>
                                    <th colspan="">Concepto</th>
                                    <th colspan="">Descripción</th>
                                    <th colspan="">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                    <tr>
                                        <td colspan=""><input type="hidden" name="cxp_name[]" id="cxp_name[]" value="{{ $pago->name }}">{{ $pago->name }}</td>
                                        <td colspan=""><input type="hidden" name="cxp_description[]" id="cxp_description[]" value="{{ $pago->description }}">{{ $pago->description }}</td>
                                        <td colspan=""><input type="hidden" name="cxp_amount[]" id="cxp_amount[]" value="{{ $pago->amount }}">$ {{ number_format($pago->amount, 2) }}</td>
                                        <input type="hidden" name="cxp_id[]" id="cxp_id[]" value="{{ $pago->id }}">
                                        <input type="hidden" name="tipocxp[]" id="tipocxp[]" value="CXP">
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem;">
                                    <th colspan="">Total cuentas por pagar</th>
                                    <th></th>
                                    <th colspan="">$ {{ number_format($totalpagos, 2) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- col cuentas por pagar -->

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table id="tablacobros" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-size:1.2rem">
                                    <td colspan="12">Cuentas por cobrar</td>
                                </tr>
                                <tr>
                                    <th colspan="">Concepto</th>
                                    <th colspan="">Descripción</th>
                                    <th colspan="">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cobros as $cobro)
                                    <tr>
                                        <td colspan=""><input type="hidden" name="cxc_name[]" id="cxc_name[]" value="{{ $cobro->name }}">{{ $cobro->name }}</td>
                                        <td colspan=""><input type="hidden" name="cxc_description[]" id="cxc_description[]" value="{{ $cobro->cobro }}">{{ $cobro->description }}</td>
                                        <td colspan=""><input type="hidden" name="cxc_amount[]" id="cxc_amount[]" value="{{ $cobro->amount }}">$ {{ number_format($cobro->amount, 2) }}</td>
                                        <input type="hidden" name="cxc_id[]" id="cxc_id[]" value="{{ $cobro->id }}">
                                        <input type="hidden" name="tipocxc[]" id="tipocxc[]" value="CXC">
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #3798b1; color:white; font-size:1.2rem; font-weight: bold">
                                    <th colspan="">Total cuentas por cobrar</th>
                                    <th></th>
                                    <th colspan="">$ {{ number_format($totalcobros, 2) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- col cuentas por cobrar -->
        </div><!--row cuentas por-->
    </div><!-- /.container-fluid -->
    <div>

        @foreach ($creditos as $credito)
            <input type="hidden" name="cred_name[]" id="cred_name[]" value="{{ $credito->name }}">
            <input type="hidden" name="cred_description[]" id="cred_description[]" value="{{ $credito->description }}">
            <input type="hidden" name="cred_amount[]" id="cred_amount[]" value="{{ $credito->amount }}">
            <input type="hidden" name="cred_id[]" id="cred_id[]" value="{{ $credito->id }}">
            <input type="hidden" name="tipocred[]" id="tipocred[]" value="CRED">
        @endforeach

        <input type="hidden" name="empresa_id" id="empresa_id" value="{{ $business }}">
        <input type="hidden" name="user_id" id="user_id" value="1">
        <input type="hidden" name="month" id="month" value="{{ $mes }}">
        <input type="hidden" name="year" id="year" value="{{ $ano }}">
    </div>
    <div class="d-flex justify-content-center" style="padding: 2rem 0 2rem 0">
        <button type="submit" class="btn btn-primary mr-2 btn-lg">Cierre</button>
    </div>

    {!! Form::close() !!}
@stop

@section('css')
@stop

@section('js')
<script>
    // $(function () {
    //     $("#tablaconsolidado").DataTable({
    //       "responsive": true, "lengtdChange": false, "autoWidtd": false,
    //       "buttons": ["pdf", "print", "colvis"]
    //     }).buttons().container().appendTo('#tablaconsolidado_wrapper .col-md-6:eq(0)');
    // });
</script>
@stop

<?php

namespace App\Http\Controllers;

use App\Models\Consolidado;
use App\Http\Requests\StoreConsolidadoRequest;
use App\Http\Requests\UpdateConsolidadoRequest;
use App\Models\Cobro;
use App\Models\Credito;
use App\Models\Cuenta;
use App\Models\Diferido;
use App\Models\Pago;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Carbon\Carbon;
//use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ConsolidadoController extends Controller
{
    public function index(StoreConsolidadoRequest $request)
    {
        if (session('business') <> '') {
            $business = session('business');
        } else {
            session(['business' => $request->business]);
            $business = session('business');
        }

        //dd($databusiness);

        if($business <> ''){
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->addAfter('seleccionempresas', [
                'key' => 'empresas',
                'text' => 'Empresas',
                'url' => '/empresas',
            ]);

            $event->menu->addAfter('empresas', [
                'key' => 'consolidado',
                'text' => 'Posición Consolidada',
                'url' => '/consolidado',
            ]);

            $event->menu->addAfter('consolidado', [
                'key' => 'cuentas',
                'text' => 'Cuentas bancarias',
                'url' => '/cuentas',
            ]);

            $event->menu->addAfter('cuentas', [
                'key' => 'diferidos',
                'text' => 'Diferidos',
                'url' => '/diferidos',
            ]);

            $event->menu->addAfter('diferidos', [
                'key' => 'cobros',
                'text' => 'Cuentas por Cobrar',
                'url' => '/cobros',
            ]);

            $event->menu->addAfter('cobros', [
                'key' => 'pagos',
                'text' => 'Cuentas por Pagar',
                'url' => '/pagos',
            ]);

            $event->menu->addAfter('pagos', [
                'key' => 'creditos',
                'text' => 'Creditos Fiscales',
                'url' => '/creditos',
            ]);
        });}

        $cuentas = Cuenta::where('empresa_id', $business)->get();
        $diferidos = Diferido::where('empresa_id', $business)->get();
        $cobros = Cobro::where('empresa_id', $business)->get();
        $pagos = Pago::where('empresa_id', $business)->get();
        $creditos = Credito::where('empresa_id', $business)->get();

        $fecha = Carbon::now();
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');

        return view('consolidado1', compact('business', 'cuentas', 'diferidos', 'cobros', 'pagos', 'creditos', 'mes', 'ano'));
    }

    public function create()
    {
        //
    }

    public function store(StoreConsolidadoRequest $request)
    {
        //
    }

    public function show(Consolidado $Consolidado)
    {
        //
    }

    public function edit(Consolidado $Consolidado)
    {
        //
    }

    public function update(UpdateConsolidadoRequest $request, Consolidado $Consolidado)
    {
        //
    }

    public function destroy(Consolidado $Consolidado)
    {
        //
    }

    public function cierre(StoreConsolidadoRequest $request)
    {
        //dd($request);

        foreach($request->account_id as $keycb => $cb){
            $rescb[] = array('name' => $request->account_name[$keycb], 'description' => $request->account_number[$keycb], 'amount' => $request->amount[$keycb], 'tipo' => $request->tipocb[$keycb],
                            'empresa_id' => $request->empresa_id, 'user_id' => $request->user_id, 'month' => $request->month, 'year' => $request->year);
        }
        //dd($rescb);

        DB::table('consolidados')->insert($rescb);

        foreach($request->dif_id as $keydif => $dif){
            $resdif[] = array('name' => $request->dif_name[$keydif], 'description' => $request->dif_description[$keydif], 'amount' => $request->dif_amount[$keydif], 'tipo' => $request->tipodif[$keydif],
                            'empresa_id' => $request->empresa_id, 'user_id' => $request->user_id, 'month' => $request->month, 'year' => $request->year);
        }

        DB::table('consolidados')->insert($resdif);

        foreach($request->cxp_id as $keycxp => $cxp){
            $rescxp[] = array('name' => $request->cxp_name[$keycxp], 'description' => $request->cxp_description[$keycxp], 'amount' => $request->cxp_amount[$keycxp], 'tipo' => $request->tipocxp[$keycxp],
                            'empresa_id' => $request->empresa_id, 'user_id' => $request->user_id, 'month' => $request->month, 'year' => $request->year);
        }

        DB::table('consolidados')->insert($rescxp);

        foreach($request->cxc_id as $keycxc => $cxc){
            $rescxc[] = array('name' => $request->cxc_name[$keycxc], 'description' => $request->cxc_description[$keycxc], 'amount' => $request->cxc_amount[$keycxc], 'tipo' => $request->tipocxc[$keycxc],
                            'empresa_id' => $request->empresa_id, 'user_id' => $request->user_id, 'month' => $request->month, 'year' => $request->year);
        }

        DB::table('consolidados')->insert($rescxc);

        foreach($request->cred_id as $keycred => $cred){
            $rescred[] = array('name' => $request->cred_name[$keycred], 'description' => $request->cred_description[$keycred], 'amount' => $request->cred_amount[$keycred], 'tipo' => $request->tipocred[$keycred],
                            'empresa_id' => $request->empresa_id, 'user_id' => $request->user_id, 'month' => $request->month, 'year' => $request->year);
        }

        DB::table('consolidados')->insert($rescred);

        $proxmes = new Carbon('next month');
        $proxmes = $proxmes->format('m');

        Cuenta::where('status', 'ACTIVO')
        ->update(['month' => $proxmes]);

        Diferido::where('status', 'ACTIVO')
        ->update(['month' => $proxmes]);

        Cobro::where('status', 'ACTIVO')
        ->update(['month' => $proxmes]);

        Pago::where('status', 'ACTIVO')
        ->update(['month' => $proxmes]);

        Credito::where('status', 'ACTIVO')
        ->update(['month' => $proxmes]);

        return redirect()->route('consolidado.index');
    }
}

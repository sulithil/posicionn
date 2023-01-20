<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class PagoController extends Controller
{
    public function index()
    {
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
        });

        $business = session('business');

        $pagos = Pago::where('empresa_id', $business)->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
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
        });

        $fecha = Carbon::now();

        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');

        return view('pagos.create', compact('mes', 'ano'));
    }

    public function store(StorePagoRequest $request)
    {
        Pago::create($request->all());

        return redirect()->route('pagos.index');
    }

    public function show(Pago $Pago)
    {
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
        });
    }

    public function edit(Pago $pago)
    {
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
        });

        //dd($diferido);
        return view('pagos.edit', compact('pago'));
    }

    public function update(UpdatePagoRequest $request, Pago $pago)
    {
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
        });

        $pago->update($request->all());
        return redirect()->route('pagos.index');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index');
    }
}

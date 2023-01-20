<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Http\Requests\StoreCreditoRequest;
use App\Http\Requests\UpdateCreditoRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class CreditoController extends Controller
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

        $creditos = Credito::where('empresa_id', $business)->get();
        return view('creditos.index', compact('creditos'));
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

        return view('creditos.create', compact('mes', 'ano'));
    }

    public function store(StoreCreditoRequest $request)
    {
        Credito::create($request->all());

        return redirect()->route('creditos.index');
    }

    public function show(Credito $cobro)
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

    public function edit(Credito $credito)
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

        return view('creditos.edit', compact('credito'));
    }

    public function update(UpdateCreditoRequest $request, Credito $credito)
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

        $credito->update($request->all());
        return redirect()->route('creditos.index');
    }

    public function destroy(Credito $credito)
    {
        $credito->delete();
        return redirect()->route('creditos.index');
    }
}

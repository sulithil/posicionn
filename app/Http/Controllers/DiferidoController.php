<?php

namespace App\Http\Controllers;

use App\Models\Diferido;
use App\Http\Requests\StoreDiferidoRequest;
use App\Http\Requests\UpdateDiferidoRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class DiferidoController extends Controller
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

        $diferidos = Diferido::where('empresa_id', $business)->get();
        return view('diferidos.index', compact('diferidos'));
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

        return view('diferidos.create', compact('mes', 'ano'));
    }

    public function store(StoreDiferidoRequest $request)
    {
        Diferido::create($request->all());

        return redirect()->route('diferidos.index');
    }

    public function show(Diferido $Diferido)
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

    public function edit(Diferido $diferido)
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
        return view('diferidos.edit', compact('diferido'));
    }

    public function update(UpdateDiferidoRequest $request, Diferido $diferido)
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

        $diferido->update($request->all());
        return redirect()->route('diferidos.index');
    }

    public function destroy(Diferido $diferido)
    {
        $diferido->delete();
        return redirect()->route('diferidos.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;

use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EmpresaController extends Controller
{
    public function empresa(StoreEmpresaRequest $request)
    {
        //session(['business' => $request->business]);

        //$business = session('business');

        $request->session()->forget('business');

        $empresas = Empresa::get();
        return view('empresa', compact('empresas'));
    }

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

        //dd(session('business'));

        $empresas = Empresa::get();
        return view('empresas.index', compact('empresas'));
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

        return view('empresas.create');
    }

    public function store(StoreEmpresaRequest $request)
    {
        Empresa::create($request->all()+[
            'user_id' => '1',
        ]);

        return redirect()->route('empresas.index');
    }

    public function show(Empresa $empresa)
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

    public function edit(Empresa $empresa)
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

        return view('empresas.edit', compact('empresa'));
    }

    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
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

        $empresa->update($request->all());
        return redirect()->route('empresas.index');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index');
    }
}

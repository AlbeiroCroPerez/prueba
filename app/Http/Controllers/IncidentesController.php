<?php

namespace App\Http\Controllers;

use App\Models\Incidentes;
use Illuminate\Http\Request;

class IncidentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    //retornar todos los incidentes disponibles
    public function getAllIncidentes()
    {
        $incidentes = Incidentes::where('baja', 0)->paginate(10);
        return $incidentes;
    }

    public function getAllIncidentesArreglo()
    {
        $incidentes = Incidentes::where('baja', 0)->get();
        return $incidentes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nuevo_incidente = [
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
        ];
        $incidentes = Incidentes::create($nuevo_incidente);
        return $incidentes;
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidentes $incidentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidentes $incidentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidentes $incidentes)
    {
        $incidentes = Incidentes::find($incidentes);
        $incidentes->tipo = $request->tipo;
        $incidentes->descripcion = $request->descripcion;
        $incidentes->fecha = $request->fecha;
        $incidentes->save();
        return $incidentes;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidentes $incidentes)
    {
        $incidentes = Incidentes::find($incidentes);
        $incidentes->baja = 1;
        $incidentes->save();
        return [ 'eliminado' => true ];
    }
}

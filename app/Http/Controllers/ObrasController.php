<?php

namespace App\Http\Controllers;

use App\Models\Obras;
use App\Models\Imagenes;
use App\Models\Incidentes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Obras/index');
    }

    //retorna todas las obras disponibles
    public function getAllObras()
    {
        $obras = Obras::where('baja', 0)->paginate(10);
        return $obras;
    }

    public function getAllObrasArreglo()
    {
        $obras = Obras::where('baja', 0)->get();
        return $obras;
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
        $nueva_obra = [
            'numero' => $request->numero,
            'nombre' => $request->nombre,
            'clave' => $request->clave,
            'objeto' => $request->objeto,
            'direccion' => $request->direccion,
            'coordenadas' => $request->coordenadas,
            'imagen_id' => $request->imagen_id,
            'incidente_id' => $request->incidente_id,
        ];
        $obras = Obras::create($nueva_obra);
        return $obras;
    }

    /**
     * Display the specified resource.
     */
    public function show(Obras $obras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obras $obras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obras $obras)
    {
        $obras = Obras::find($obras);
        $obras->numero = $request->numero;
        $obras->nombre = $request->nombre;
        $obras->clave = $request->clave;
        $obras->objeto = $request->objeto;
        $obras->direccion = $request->direccion;
        $obras->coordenadas = $request->coordenadas;
        $obras->imagen_id = $request->imagen_id;
        $obras->incidente_id = $request->incidente_id;
        $obras->save();
        return $obras;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obras $obras)
    {
        $obras = Obras::find($obras);
        $obras->baja = 1;
        $obras->save();
        return [ 'eliminado' => true ];
    }
}

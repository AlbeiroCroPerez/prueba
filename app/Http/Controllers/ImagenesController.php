<?php

namespace App\Http\Controllers;

use App\Models\Imagenes;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    //retornar todas las imagenes disponibles
    public function getAllImagenes()
    {
        $imagenes = Imagenes::where('baja', 0)->paginate(10);
        return $imagenes;
    }

    public function getAllImagenesArreglo()
    {
        $imagenes = Imagenes::where('baja', 0)->get();
        return $imagenes;
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
        $nueva_imagen = [
        'imagen'=> $request->imagen,
        'autor'=> $request->autor,
        'url'=> $request->url,
        ];
        $imagenes = Imagenes::create($nueva_imagen);
        return $imagenes;
    }

    /**
     * Display the specified resource.
     */
    public function show(Imagenes $imagenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagenes $imagenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagenes $imagenes)
    {
        $imagenes = Imagenes::find($imagenes);
        $imagenes->imagen = $request->imagen;
        $imagenes->autor = $request->autor;
        $imagenes->url = $request->url;
        $imagenes->save();
        return $imagenes;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagenes $imagenes)
    {
        $imagenes = Imagenes::find($imagenes);
        $imagenes->baja = 1;
        $imagenes->save();
        return [ 'eliminado' => true ];
    }
}

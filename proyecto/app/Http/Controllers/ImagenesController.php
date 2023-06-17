<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('imagenes.index');
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
        dd($artista);
        $imagen = new Imagen();
        $imagen->titulo = $request->titulo;
        $imagen->archivo = $request->imagen->store('public/artistas');
        $imagen->cuenta_user = $artista;
        $imagen->save();
        return redirect()->route('artistas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuenta $cuenta)
    {
        return view('imagenes.show', compact('cuenta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
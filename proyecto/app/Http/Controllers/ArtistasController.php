<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

class ArtistasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artistas = Cuenta::where('perfil_id',1)->get();
        $perfil = Perfil::where('id',1)->first();
        /* dd($perfil->id); */
        /* dd($artistas); */
        return view('artistas.index',compact('artistas','perfil'));
    }

    public function index_artista(Request $request)
    {
        $imagenes = Imagen::where('cuenta_user','=',$request->filtrado)->get();
        /* dd($imagenes); */
        return view('artistas.index_user',compact('imagenes'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;

class AdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuentas = Cuenta::all();
        $perfiles = Perfil::all();
        return view('administradores.index', compact('cuentas', 'perfiles'));
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
    public function showimagen(Cuenta $cuenta)
    {
        $imagenes = Imagen::where('cuenta_user','=',$cuenta->user)->get();
        /* dd($imagenes); */
        return view('administradores.showimagenes',compact('imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editimagen(Imagen $imagen,Request $request)
    {
        return view('administradores.editimagen',compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateimagen(Request $request, Imagen $imagen)
    {
        /* $imagen = Imagen::find($imagen->cuenta_user); */
        /* dd($cuenta); */
        /* $cuenta = $cuenta->user; */
        $imagen->motivo_ban = $request->comentario;
        $imagen->baneada = true;
        $imagen->save();
        return redirect()->route('administradores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuenta $cuenta)
    {
        //dd($cuenta);
        $cuenta->delete();
        return redirect()->route('administradores.index');
    }
}

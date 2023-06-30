<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;
use Illuminate\Support\Facades\Hash;
use Gate;

class AdministradoresController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /* if(Gate::denies('cuenta')){
            return redirect()->route('imagenes.index');
        } */

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
    public function editimagen(Imagen $imagen)
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

    public function editcuenta(Cuenta $cuenta)
    {
        return view('administradores.editcuenta',compact('cuenta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatecuenta(Request $request, Cuenta $cuenta)
    {
        /* $imagen = Imagen::find($imagen->cuenta_user); */
        /* dd($cuenta); */
        /* $cuenta = $cuenta->user; */
        $cuenta->user = $request->user;
        $cuenta->password = Hash::make($request->password);
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->save();
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

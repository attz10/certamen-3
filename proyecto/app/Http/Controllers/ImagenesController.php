<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gate;

class ImagenesController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imagenes = Imagen::all();
        $artistas = Cuenta::where('perfil_id',1)->get();
        return view('imagenes.index', compact('imagenes', 'artistas'));
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
        $imagen = new Imagen();
        $imagen->titulo = $request->titulo;
        $imagen->archivo = $request->imagen->store('public/artistas');
        $imagen->cuenta_user = Auth::user()->user;
        $imagen->save();
        return redirect()->route('imagenes.show',Auth::user()->user);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuenta $cuenta)
    {
        /* dd($cuenta); */
        $imagenes = Imagen::where('cuenta_user','=',$cuenta->user)->get();
        /* dd($imagenes); */
        return view('imagenes.show', compact('cuenta','imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        return view('imagenes.edit',compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Imagen $imagen, Request $request)
    {
        $cuenta = Cuenta::find($imagen->cuenta_user);
        /* dd($cuenta); */
        /* $cuenta = $cuenta->user; */
        $imagen->titulo = $request->titulo;
        $imagen->save();
        return redirect()->route('imagenes.show',$cuenta->user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagen $imagen)
    {
        /* dd('hola'); */
        $cuenta = Cuenta::find($imagen->cuenta_user);
        Storage::delete($imagen->archivo);
        DB::table('imagenes')->where('id','=',$imagen->id)->delete();
        return redirect()->route('imagenes.show',$cuenta->user);
    }
}

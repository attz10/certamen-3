@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="col">
            <form action="">
                <label class="form-label" for="filtrado">Filtrado por artista:</label>
                <select name="filtrado" id="filtrado" class="form-control">
                    @foreach ($artistas as $artista)
                        <option value="{{$artista->user}}">{{$artista->user}}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach ($imagenes as $imagen)
            <div class="card" style="width: 24rem;">
                <img src="{{Storage::url($imagen->archivo)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$imagen->titulo}}</h5>
                    <p class="card-text text-center">subida por el artista: <b>{{$imagen->cuenta_user}}</b></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
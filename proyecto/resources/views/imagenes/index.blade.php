@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('artistas.index_artista')}}">
                        @csrf
                        <label class="form-label" for="filtrado">Filtrado por artista:</label>
                        <select name="filtrado" id="filtrado" class="form-control">
                            @foreach ($artistas as $artista)
                                <option value="{{$artista->user}}">{{$artista->user}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">ver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-group">
            @foreach ($imagenes as $imagen)
                @if ($imagen->baneada == false)
                    <div class="card" style="width: 24rem;">
                        <img src="{{Storage::url($imagen->archivo)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$imagen->titulo}}</h5>
                            <p class="card-text text-center">subida por el artista: <b>{{$imagen->cuenta_user}}</b></p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
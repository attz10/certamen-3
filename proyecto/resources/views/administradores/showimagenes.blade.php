@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="card-group">
            @foreach ($imagenes as $imagen)
                @if ($imagen->baneada == false)
                    <div class="card" style="width: 24rem;">
                        <img src="{{Storage::url($imagen->archivo)}}" style="width: 18rem" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$imagen->titulo}}</h5>
                            <p class="card-text text-center">subida por el artista: <b>{{$imagen->cuenta_user}}</b></p>
                            <a href="{{route('administradores.editimagen',$imagen->id)}}" class="btn btn-info">Banear imagen</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
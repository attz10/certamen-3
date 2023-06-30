@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="card-group">
            @foreach ($imagenes as $imagen)
                @if ($imagen->baneada == false)
                    <div class="card" style="width: 24rem;">
                        <img src="{{Storage::url($imagen->archivo)}}" class="card-img-top" style="width: 18rem" alt="...">
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
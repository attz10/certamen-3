@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="card-group">
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
    </div>
@endsection
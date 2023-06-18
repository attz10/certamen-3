@extends('layouts.master')

@section('principal')
    <h3>Editar Imagen {{$imagen->titulo}}</h3>
    <div class="row">
        <div class="col-2">
            <div class="card">
                <div class="card-header">Imagen</div>
                <img src="{{Storage::url($imagen->archivo)}}" alt="..." class="card-img-top">
                <ol class="list-group">
                    <li class="list-group-item"><b>Titulo:</b>{{$imagen->titulo}}</li>
                    <li class="list-group-item"><b>Artista:</b>{{$imagen->cuenta_user}}</li>
                </ol>
            </div>
        </div>
        {{-- form de editar imagen --}}
        <div class="col-6">
            <div class="card">
                <div class="card-header">Imagen</div>
                <div class="card-body">
                    <form method="POST" action="{{route('imagenes.update',$imagen->id)}}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo a cambiar</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" value="{{$imagen->titulo}}">
                        </div>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
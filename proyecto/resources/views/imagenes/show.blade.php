@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="col-3">
            <div class="card">
                <form method="POST" action="{{route('imagenes.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="titulo" class="form-label">Titulo de la imagen</label>
                        <input type="text" id="titulo" name="titulo" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <input type="file" id="imagen" name="imagen" class="form-control">
                    </div>
                    <button class="btn btn-success" type="submit">subir imagen</button>
                </form>
            </div>
        </div>
        <div class="col-9">
            @foreach ($imagenes as $imagen)
                <div class="card-group">
                    <div class="card" style="width: 24rem;">
                        <img src="{{Storage::url($imagen->archivo)}}" style="width: 18rem" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$imagen->titulo}}</h5>
                            <p class="card-text text-center">subida por el artista: <b>{{$imagen->cuenta_user}}</b></p>
                            @if ($imagen->baneada == true)
                                <label for="comentario" class="form-label">Motivo de Ban:</label>
                                <textarea class="form-control" name="comentario" id="comentario">{{$imagen->motivo_ban}}</textarea>
                            @endif
                            <div class="btn-group">
                                <a href="{{route('imagenes.edit',$imagen->id)}}" class="btn btn-info rounded mt-2">Editar</a>
                                <form method="POST" action="{{route('imagenes.destroy',$imagen->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger mt-2">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
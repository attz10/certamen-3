@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="col-6">
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
                    <div class="mb-2">
                        <label for="user" class="form-label">user:</label>
                        <input type="text" id="user" name="user" class="form-control" value="{{$cuenta->user}}">
                    </div>
                    <button class="btn btn-success" type="submit">subir imagen</button>
                </form>
            </div>
        </div>
    </div>
@endsection
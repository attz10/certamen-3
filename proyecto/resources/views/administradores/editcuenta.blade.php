@extends('layouts.master')

@section('principal')
    <div class="card">
        <div class="card-header">
            <h3>Editar cuenta:</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('administradores.updatecuenta',$cuenta->user)}}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="user" class="form-label">Nombre de usuario:</label>
                    <input type="text" id="user" name="user" class="form-control" value="{{$cuenta->user}}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{$cuenta->password}}">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{$cuenta->nombre}}">
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" value="{{$cuenta->apellido}}">
                </div>
                <button type="submit" class="btn btn-success">confirmar</button>
                <button type="reset" class="btn btn-warning">cancelar</button>
            </form>
        </div>
    </div>
@endsection
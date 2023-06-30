@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3>Ingrese credenciales para ininciar sesion:</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('usuarios.login')}}">
                        @csrf
                        <div class="mb-2">
                            <label for="user" class="form-label">User</label>
                            <input type="text" name="user" id="user" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Iniciar Sesion</button>
                    </form>
                </div>
            </div>
            @if($errors->any())
                <div class="alert alert-warning mt-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection

@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="col-6">
            <div class="col-12 col-lg-8 order-last order-lg-first">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>User</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Perfil</th>
                            <th>Agregar Imagenes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artistas as $num=>$artista)
                        <tr>
                            <td class="align-middle">{{$num+1}}</td>
                            <td class="align-middle">{{$artista->user}}</td>
                            <td class="align-middle">{{$artista->nombre}}</td>
                            <td class="align-middle">{{$artista->apellido}}</td>
                            <td class="align-middle">{{$perfil->nombre}}</td>
                            <td class="align-middle"><a class="btn btn-light" href="{{route('imagenes.show',$artista->user)}}">agregar imagenes</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
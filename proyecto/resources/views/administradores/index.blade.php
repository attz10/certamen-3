@extends('layouts.master')

@section('principal')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="col-12 col-lg-8 order-last order-lg-first">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>User</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo de perfil</th>
                            <th colspan="3">Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $num=>$cuenta)
                        <tr>
                            <td class="align-middle">{{$num+1}}</td>
                            <td class="align-middle">{{$cuenta->user}}</td>
                            <td class="align-middle">{{$cuenta->nombre}}</td>
                            <td class="align-middle">{{$cuenta->apellido}}</td>
                            <td class="align-middle">
                                @foreach ($perfiles as $perfil)
                                    @if ($perfil->id==$cuenta->perfil_id)
                                        {{$perfil->nombre}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="" class="btn btn-info"><span class="material-icons">edit</span></a>
                            </td>
                            <td>
                                @foreach ($perfiles as $perfil)
                                    @if (($perfil->id==$cuenta->perfil_id)&&($perfil->nombre=='artista'))
                                    <a href="" class="btn btn-warning"><span class="material-icons">delete</span></a>
                                    <td><a href="" class="btn btn-warning"><span class="material-icons">image</span></a></td>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
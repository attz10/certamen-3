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
                                        {{--borrar cuenta--}}
                                        <span data-bs-toggle="tooltip" data-bs-title="Borrar {{$cuenta->nombre}}">
                                            <button type="button" class="btn btn-sm btn-danger pb-0" data-bs-toggle="modal" data-bs-target="#cuentaBorrarModel{{$cuenta->user}}">
                                                <span class="material-icons">delete</span>
                                            </button>
                                        </span>
                                    <td><a href="{{route('administradores.showimagen',$cuenta->user)}}" class="btn btn-warning"><span class="material-icons">image</span></a></td>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        {{--Borrar cuenta--}}
                        <div class="modal fade" id="cuentaBorrarModel{{$cuenta->user}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar cuenta:</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                ¿Desea Eliminar cuenta {{$cuenta->user}}?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{route('administradores.destroy',$cuenta->user)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Borrar cuenta</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
@extends('layouts.master')

@section('principal')
    <div class="card">
        <div class="card-header">
            <h3>Motivo de baneo:</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('administradores.updateimagen',$imagen->id)}}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario:</label>
                    <textarea id="comentario" name="comentario" class="form-control">

                    </textarea>
                </div>
                <button type="submit" class="btn btn-success">confirmar</button>
                <button type="reset" class="btn btn-warning">cancelar</button>
            </form>
        </div>
    </div>
@endsection
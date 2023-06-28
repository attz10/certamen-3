@extends('layouts.master')

@section('principal')
    <div class="card"> 
        <div class="card-header">
            <h3>Create una cuenta de artista:</h3>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <form action="">
                                <div class="mb-2">
                                    <label for="user" class="form-label">User</label>
                                    <input type="text" name="user" id="user" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
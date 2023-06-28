@extends('layouts.master')

@section('principal')
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
@endsection

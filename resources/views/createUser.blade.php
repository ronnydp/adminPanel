@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="{{ route('store') }}" method="post">
            @csrf
                <div class="mb-3">
                    <h2 class="text-center">Crear Usuario</h2>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Correo electrónico" required>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Contraseña" required>
                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between">
                <h2><strong>Usuarios</strong></h2>
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('create') }}'">
                    Crear Usuario
                </button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Fecha de acceso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->uid }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->metadata->createdAt ? $user->metadata->createdAt->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            <td>{{ $user->metadata->lastLoginAt ? $user->metadata->lastLoginAt->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            <td><button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Acción
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('edit', ['id' => $user->uid])}}">Editar</a></li>
                                    <form action="{{ route('destroy', ['id' => $user->uid]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item">Eliminar</button>
                                    </form>
                                </ul>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
                
            </table>
        </div>
    </div>
</div>

@endsection

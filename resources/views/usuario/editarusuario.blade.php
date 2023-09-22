@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Usuario Externo</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('updateUsuarioExterno', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Utiliza el método PUT para actualizar el registro -->

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Nit" class="form-label">NIT</label>
                        <input type="text" id="Nit" name="Nit" class="form-control" tabindex="1" value="{{$usuario->nit}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="2" value="{{$usuario->nombre}}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Genero" class="form-label">Género</label>
                        <select id="Genero" name="Genero" class="form-control" tabindex="3">
                            <option value="F" {{$usuario->Genero == 'F' ? 'selected' : ''}}>Femenino</option>
                            <option value="M" {{$usuario->Genero == 'M' ? 'selected' : ''}}>Masculino</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="Institucion" class="form-label">Institución</label>
                        <input type="text" id="Institucion" name="Institucion" class="form-control" tabindex="4" value="{{$usuario->institucion}}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control" required>
                            <option value="Maestro" {{$usuario->tipo == 'Maestro' ? 'selected' : ''}}>Maestro</option>
                            <option value="Estudiante Externo" {{$usuario->tipo == 'Estudiante Externo' ? 'selected' : ''}}>Estudiante Externo</option>

                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary">Actualizar Usuario Externo</button>
                    </div>
                    <div class="col-md-6">
                        <a href="/usuarios" class="btn btn-secondary">Regresar a Usuarios Externos</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

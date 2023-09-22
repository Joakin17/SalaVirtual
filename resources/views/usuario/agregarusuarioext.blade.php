@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Usuario Externo</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/guardarUsuario" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Nit" class="form-label">Nit</label>
                        <input type="text" id="Nit" name="Nit" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Genero" class="form-label">Género</label>
                        <select id="Genero" name="Genero" class="form-control" required>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="Institucion" class="form-label">Institución</label>
                        <input type="text" id="Institucion" name="Institucion" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control" required>
                            <option value="Maestro">Maestro</option>
                            <option value="Estudiante Externo">Estudiante Externo</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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

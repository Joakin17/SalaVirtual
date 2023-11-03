@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Préstamos de Salas de American Space</h1>
    <!-- boton que muestra el modal -->
    <div class="mb-3">
        <button type="button" class="custom-button" data-toggle="modal" data-target="#exampleModal">
            Prestar a Usuario Externo
        </button>
        <button type="button" class="custom-button" data-toggle="modal" data-target="#modalEstudiante">
        Prestar Estudiante
        </button>
    </div>
      <!-- Modal para estudiantes -->
      <div class="modal fade" id="modalEstudiante" tabindex="-1" role="dialog" aria-labelledby="modalEstudianteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEstudianteLabel">Prestar sala de american space a Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Prestamosspace.showestu', '1') }}" method="GET">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Buscar por Carné</label>
                            <input type="text" class="form-control" id="carne" name="carne" placeholder="Ingresar carné">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="custom-button" style="margin-right:10px;">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">buscar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('Prestamosspace.showspace', '1') }}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Buscar Usuario Externo</label>
                        <input type="text" class="form-control" id="Nit" name="Nit" placeholder="Ingresar NIT">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="custom-button " style="margin-right:10px;">Buscar usuario</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
    <!-- Código para la tabla que muestra los préstamos de espacio -->
    <div class="table-responsive">
    <table id="combinedTable" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
            <thead class="table-dark">
        <tr>
            <th>Tipo</th>
            <th>Carné / NIT</th>
            <th>Nombre</th>
            <th>Facultad / Institución</th>
            <th>Mesa</th>
            <th>Puesto</th>
            <th>Hora de Entrada</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\App\Models\Prestamosspace::all() as $prestamo)
            <tr>
                <td>{{ $prestamo->tipo }}</td>
                <td>{{ $prestamo->nit }}</td>
                <td>{{ $prestamo->nombre }}</td>
                <td>{{ $prestamo->institucion }}</td>
                <td>{{ $prestamo->mesa }}</td>
                <td>{{ $prestamo->puesto }}</td>
                <td>{{ $prestamo->hora_entrada }}</td>
                <td>
                    <a href="{{ route('liberar.space', ['id' => $prestamo->id]) }}" class="custom-button">Liberar</a>
                </td>
            </tr>
        @endforeach

        @foreach(\App\Models\PrestamoSpaceEstudiante::all() as $prestamoEstudiante)
            <tr>
                <td>Estudiante</td>
                <td>{{ $prestamoEstudiante->carnet }}</td>
                <td>{{ $prestamoEstudiante->nombre }}</td>
                <td>{{ $prestamoEstudiante->facultad }}</td>
                <td>{{ $prestamoEstudiante->mesa }}</td>
                <td>{{ $prestamoEstudiante->puesto }}</td>
                <td>{{ $prestamoEstudiante->hora_entrada }}</td>
                <td>
                    <a href="{{ route('liberar.estudiante', ['id' => $prestamoEstudiante->id]) }}" class="custom-button">Liberar</a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

    </div>
</div>

<style>
    .custom-button {
        background-color: #9D2720;
        color: #F6C03D;
        border: none;
        padding: 8px 16px;
        margin: 5px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }
    .custom-button:hover {
        background-color: #F6C03D;
        color: #9D2720;
        transition: 0.3s;
    }
</style>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Préstamos de Computadoras</h1>
    <!-- botones para abrir los modales -->
    <div class="mb-3">
    <button type="button" class="custom-button" data-toggle="modal" data-target="#modalEstudiante">
        Prestar Estudiante
    </button>
    <button type="button" class="custom-button" data-toggle="modal" data-target="#modalUsuarioExterno">
        Prestar Usuario Externo
    </button>
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

    <!-- Modal para estudiantes -->
    <div class="modal fade" id="modalEstudiante" tabindex="-1" role="dialog" aria-labelledby="modalEstudianteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEstudianteLabel">Prestar Computadora a Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('prestamocompus.show', '1') }}" method="GET">
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

    <!-- Modal para usuarios externos -->
    <div class="modal fade" id="modalUsuarioExterno" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioExternoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUsuarioExternoLabel">Prestar Computadora a Usuario Externo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('prestamocompus.showspace', '1') }}" method="GET">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Buscar por NIT</label>
                            <input type="text" class="form-control" id="Nit" name="Nit" placeholder="Ingresar NIT">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="custom-button" style="margin-right:10px;">Buscar Usuario Externo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabla que muestra los préstamos combinados -->
    <div class="table-responsive">
        <table id="combinedTable" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th scope="col"># de PC</th>
                    <th scope="col">Carné / NIT</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Facultad / Institución</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Hora de Entrada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamospc as $prestamopc)
                <tr data-id="{{ $prestamopc->id }}">
                    <td>{{$prestamopc->pc}}</td>
                    <td>{{$prestamopc->carne }}</td>
                    <td>{{$prestamopc->nombre }}</td>
                    <td>{{$prestamopc->facultad }}</td>
                    <td>Estudiante</td>
                    <td>{{$prestamopc->hora_prestamo }}</td>
                    <td><a href="{{route('liberar', ['id'=> $prestamopc->id, 'comp'=>$prestamopc->pc]) }}" class="custom-button">Liberar</a></td>
                </tr>
                @endforeach
                
                @foreach ($prestamospcspace as $prestamopcspace)
                <tr>
                    <td>{{ $prestamopcspace->pc }}</td>
                    <td>{{ $prestamopcspace->nit }}</td>
                    <td>{{ $prestamopcspace->nombre }}</td>
                    <td>{{ $prestamopcspace->institucion }}</td>
                    <td>{{ $prestamopcspace->tipo }}</td>
                    <td>{{ $prestamopcspace->hora_prestamo }}</td>
                    <td>
                        <!-- Agrega las acciones que desees, como liberar, editar, etc. -->
                        <a href="{{ route('liberarpcspace', ['id' => $prestamopcspace->id, 'comp' => $prestamopcspace->pc]) }}" class="custom-button">Liberar</a>                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

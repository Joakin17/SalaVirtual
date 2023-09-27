@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Préstamos de Computadoras</h1>
    <!-- boton que muestra el modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Prestar
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prestar Computadora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('prestamocompus.show', '1') }}" method="GET">
        <div class="form-group">
          <label for="exampleFormControlInput1">Buscar Usuario</label>
          <input type="text" class="form-control" id="carne" name="carne" placeholder="Ingresar carné">
        </div>
      </div>
      <div class="modal-footer">   
      <button class="btn btn-primary" style="margin-right:10px;">Buscar</button>
      </form>
      </div>
    </div>
  </div>
</div>
 <!-- codigo para la tabla que muestra los prestamos de pc -->
    <div class="table-responsive">
        <table id="trepartidor" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th scope="col"># de PC</th>
                    <th scope="col">Carné</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Facultad</th>
                    <th scope="col">Hora De Entrada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamospc as $prestamopc )
                <tr data-id="{{ $prestamopc->id }}">
                    <td>{{$prestamopc->pc}}</td>
                    <td>{{$prestamopc->carne }}</td>
                    <td>{{$prestamopc->nombre }}</td>
                    <td>{{$prestamopc->facultad }}</td>
                    <td>{{$prestamopc->hora_prestamo }}</td>
                    <td><a href="{{route('liberar', ['id'=> $prestamopc->id, 'comp'=>$prestamopc->pc]) }}" class="btn btn-info">Liberar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


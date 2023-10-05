@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Préstamos de salas de American Space</h1>
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
      <form action="#" method="GET">
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
    
</div>

@endsection

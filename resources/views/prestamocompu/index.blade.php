@extends('layouts.app')

@section('content')

{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" href="https://kit.fontawesome.com/b64093b700.css" crossorigin="anonymous">
 







<h1>Préstamos de Computadoras</h1>
<div ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Prestar
</button><br></div>
<br>

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
      <form>


  <div class="form-group">
    <label for="exampleFormControlInput1">PC</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="PC">
  </div>

<div class="form-group">
    <label for="exampleFormControlInput1">PC</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="PC">
  </div>


</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>









{{-- <table id="trprestarpc" class="display responsive nowrap" style="width:100%"> --}}
  <div class="table-responsive">
<table id="trepartidor" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
<thead class="table-dark">
    <tr >
      
     
      <th scope="col"># de PC</th>
      <th scope="col">Carné</th>
      <th scope="col">Nombre</th>
      <th scope="col">Facultad</th>
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
      
    @endforeach
</tbody>
</table>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://kit.fontawesome.com/b64093b700.js" crossorigin="anonymous"></script> 

<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js" defer></script>

<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" defer></script>








<script src="https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"></script>



<script>
       

$(document).ready(function() {

  $('#tprestarpc').DataTable( {
    responsive: true
} );



} );
    
    </script>




@endsection
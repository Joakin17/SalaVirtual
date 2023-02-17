@extends('layouts.app')

@section('content')

{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" href="https://kit.fontawesome.com/b64093b700.css" crossorigin="anonymous">
 







<h1>Préstamos de Computadoras</h1>
<div ><a href="#" data-toggle="modal" data-target="#addrepartidor" class="btn btn-primary float-right" > Prestar</a></div>
<br>
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
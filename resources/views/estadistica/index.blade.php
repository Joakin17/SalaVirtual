@extends('layouts.app')

@section('content')


{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" href="https://kit.fontawesome.com/b64093b700.css" crossorigin="anonymous">

<div class="">
    <h1 class="text-center py-5">Tablas de Estadísticas</h1>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="w-50">
            <a href="/estadisticacompus?year={{date('Y')}}" class="btn btn-success p-4">
                <h2>Estadísticas de Préstamos de Computadoras</h2>
            </a>
        </div>
        <br>
        <div class="w-50">
            <a href="/estadisticasalas?year={{date('Y')}}" class="btn btn-secondary p-4">
                <h2>Estadísticas de Préstamos de Salas de Estudio</h2>
            </a>
        </div>
        
    </div>
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
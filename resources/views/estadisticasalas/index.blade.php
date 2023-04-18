@extends('layouts.app')

@section('content')


{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" href="https://kit.fontawesome.com/b64093b700.css" crossorigin="anonymous">

<div class="py-2">
    

    @include('estadistica.opcionesala')

    <div class="p-3">
      <form method="get" action="/estadisticasalas">
      <p><strong>Año</strong></p>
      <div class="d-flex flex-row">
        <select class="form-control col-1" name="year" required>
          <option value="">Año</option>
          <?php $year = date("Y"); for($i=$year;$i>=1990;$i--) { echo "<option value='".$i."'>".$i."</option>"; } ?>
        </select>
        <button class="btn btn-primary ml-2">Buscar</button>
      </div>
      </form>
    </div>
    <h2 class="text-center">Estadísticas anuales Préstamos de Salas de Estudio - {{$y}}</h2>
    {{-- <table id="trprestarpc" class="display responsive nowrap" style="width:100%"> --}}
  <div class="table-responsive px-3">
<table id="trepartidor" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
<thead class="table-dark">
    <tr >
      
     
      <th scope="col">Facultad</th>
      <th scope="col">Enero</th>
      <th scope="col">Febrero</th>
      <th scope="col">Marzo</th>
      <th scope="col">Abril</th>
      <th scope="col">Mayo</th>
      <th scope="col">Junio</th>
      <th scope="col">Julio</th>
      <th scope="col">Agosto</th>
      <th scope="col">Septiembre</th>
      <th scope="col">Octubre</th>
      <th scope="col">Noviembre</th>
      <th scope="col">Diciembre</th>
      <th scope="col">TOTAL</th>

    </tr>
</thead>
<tbody>
    @foreach ($estacompus as $estacompus)
    <tr data-id="">
        <td>{{$estacompus->facultad}}</td>
        <td class="text-center">{{$estacompus->enero}}</td>
        <td class="text-center">{{$estacompus->febrero}}</td>
        <td class="text-center">{{$estacompus->marzo}}</td>
        <td class="text-center">{{$estacompus->abril}}</td>
        <td class="text-center">{{$estacompus->mayo}}</td>
        <td class="text-center">{{$estacompus->junio}}</td>
        <td class="text-center">{{$estacompus->julio}}</td>
        <td class="text-center">{{$estacompus->agosto}}</td>
        <td class="text-center">{{$estacompus->septiembre}}</td>
        <td class="text-center">{{$estacompus->octubre}}</td>
        <td class="text-center">{{$estacompus->noviembre}}</td>
        <td class="text-center">{{$estacompus->diciembre}}</td>
        <td class="text-center">
          {{$estacompus->enero+$estacompus->febrero+$estacompus->marzo+$estacompus->abril+$estacompus->mayo+$estacompus->junio+$estacompus->julio+$estacompus->agosto+$estacompus->septiembre+$estacompus->octubre+$estacompus->noviembre+$estacompus->diciembre}}
        </td>
    </tr>
    @endforeach
    <tr>
      <td class="font-weight-bold">TOTAL</td>
      <td class="font-weight-bold text-center">{{$total[1]}}</td>
      <td class="font-weight-bold text-center">{{$total[2]}}</td>
      <td class="font-weight-bold text-center">{{$total[3]}}</td>
      <td class="font-weight-bold text-center">{{$total[4]}}</td>
      <td class="font-weight-bold text-center">{{$total[5]}}</td>
      <td class="font-weight-bold text-center">{{$total[6]}}</td>
      <td class="font-weight-bold text-center">{{$total[7]}}</td>
      <td class="font-weight-bold text-center">{{$total[8]}}</td>
      <td class="font-weight-bold text-center">{{$total[9]}}</td>
      <td class="font-weight-bold text-center">{{$total[10]}}</td>
      <td class="font-weight-bold text-center">{{$total[11]}}</td>
      <td class="font-weight-bold text-center">{{$total[12]}}</td>
      <td class="font-weight-bold text-center">
        {{$total[1]+$total[2]+$total[3]+$total[4]+$total[5]+$total[6]+$total[7]+$total[8]+$total[9]+$total[10]+$total[11]+$total[12]}}
      </td>
    </tr>
</tbody>
</table>
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
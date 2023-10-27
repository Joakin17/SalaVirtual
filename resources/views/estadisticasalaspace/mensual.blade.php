@extends('layouts.app')

@section('content')

<div class="py-2">
        
@include('estadistica.opcionesalaspace')

    <?php 
        $mes = array(
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        );
    ?>

    <div class="p-3 ">
      <form method="get" action="/estasalaspacemensual" class="">
        <div class="d-flex flex-row pb-3">
          <div>
            <p><strong>Año</strong></p>
            <select class="form-control" id="year" name="year" required>
            <option value="">Año</option>
            <?php $year = date("Y"); for($i=$year;$i>=1990;$i--) { echo "<option value='".$i."'>".$i."</option>"; } ?>
            </select>
          </div>
          <div class="pl-3">
            <p><strong>Mes</strong></p>
            <select class="form-control" id="month" name="month" required>
            <option value="">Mes</option>
            <?php $month = date("n"); for($i=1;$i<=12;$i++) { echo "<option value='".$i."'>".$mes[$i]."</option>"; } ?>
            </select>
          </div>
        </div>
        <button class="btn btn-primary" style="margin-right:10px;">Buscar</button>
      </form>
    </div>
    <h2 class="text-center">Estadísticas por mes Préstamos de Salas de american space</h2>
    
    <h3 class="text-center">{{'Mes: '.$mes[$m].' - Año: '.$y}}</h2>
    {{-- <table id="trprestarpc" class="display responsive nowrap" style="width:100%"> --}}
  <div class="table-responsive px-3">
<table id="trepartidor" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
<thead class="table-dark">
    <tr >
      
      <th scope="col">Facultad</th>
      <th scope="col" class="text-center">Registros</th>

    </tr>
</thead>
<tbody>

    @foreach ($estacompus as $estacompus)
    <tr data-id="">
        <td>{{$estacompus->facultad}}</td>
        <td class="text-center">{{$estacompus->registros}}</td>
    </tr>
    @endforeach
    <tr>
        <td class="font-weight-bold">TOTAL</td>
        <td class="font-weight-bold text-center">{{$total}}</td>
    </tr>

</tbody>
</table>
</div>
</div>


@endsection
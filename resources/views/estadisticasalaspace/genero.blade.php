@extends('layouts.app')

@section('content')

<div class="py-2">
        
    @include('estadistica.opcionesalaspace')

    <div class="p-3">
      <form method="get" action="/estasalasspacegenero" class="">
        <div class="d-flex flex-row pb-2">
          <div>
            <label for="">Fecha Inicial</label>
            <input type="date" class="form-control" id="inicio" name="inicio" required/>
          </div>
          <div class="pl-3">
            <label for="">Fecha Final</label>
            <input type="date" class="form-control" id="fin" name="fin" required/>
          </div>
        </div>
        <button class="btn btn-primary" style="margin-right:10px;">Buscar</button>
      </form>
    </div>
    <h2 class="text-center">Estadísticas por género Préstamos de sala de american space</h2>
    <h3 class="text-center"><?php echo $inicio." - ".$fin ?></h2>
    {{-- <table id="trprestarpc" class="display responsive nowrap" style="width:100%"> --}}
  <div class="table-responsive px-3">
<table id="trepartidor" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
<thead class="table-dark">
    <tr >
      <th scope="col">Facultad</th>
      <th scope="col" class="text-center">Mujeres</th>
      <th scope="col" class="text-center">Hombres</th>
      <th scope="col" class="text-center">TOTAL</th>
    </tr>
</thead>
<tbody>

    @foreach ($estacompus as $estacompus)
    <tr data-id="">
        <td>{{$estacompus->facultad}}</td>
        <td class="text-center">{{$estacompus->mujer}}</td>
        <td class="text-center">{{$estacompus->hombre}}</td>
        <td class="font-weight-bold text-center">{{$estacompus->mujer + $estacompus->hombre}}</td>
    </tr>
    @endforeach
    <tr>
        <td class="font-weight-bold">TOTAL</td>
        <td class="font-weight-bold text-center">{{$totalMujer}}</td>
        <td class="font-weight-bold text-center">{{$totalHombre}}</td>
        <td class="font-weight-bold text-center">{{$totalMujer + $totalHombre}}</td>
    </tr>
</tbody>
</table>
</div>
</div>

@endsection
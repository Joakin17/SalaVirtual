@extends('layouts.app')

@section('content')

<h1 class="text-center">Prestar Computadoras</h1>

<form action="/guardarsala" method="GET">
@csrf

    <div class="mb-3 col-2" >
        <label for="" class="form-label">Carné</label>
        <input type="text" id="carne" name="carne" class="form-control" tabindex="1" value=" {{$usuario->carne}} " >
    </div>
    <div class="mb-3 col-4" >
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="1" value=" {{$usuario->nombre}}  {{$usuario->apellido}} " >
    </div>
    <div class="mb-3 col-4" >
        <label for="" class="form-label">Facultad</label>
        <input type="text" id="facultad" name="facultad" class="form-control" tabindex="1" value=" {{$usuario->facultad}} " >
        
        </div> 
        <div class="mb-3 col-4" >
        <label for="" class="form-label">Carrera</label>
        <input type="text" id="carrera" name="carrera" class="form-control" tabindex="1" value=" {{$usuario->carrera}} " >
    </div>

    <div class="mb-3 col-2" >
        <label for="" class="form-label">Género</label>
        <input type="text" id="genero" name="genero" class="form-control" tabindex="1" value=" {{$usuario->genero}} ">
    </div>
    




    <div class="mb-3 col-4" >
        <label for="" class="form-label">Salas Libres</label>
        <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sala" id="sala" value="3">
  <label class="form-check-label" for="inlineRadio1">3</label>
  <select id="puesto1" name="puesto1" class="form-control">
  <option value=" "> </option>
       
        @foreach($salas as $sala)
        @if($sala->sala == 3 & $sala->estado == 0)
       <option value="{{ $sala->puesto }}">{{ $sala->puesto }}</option>
       @endif
       @endforeach
       </select>

</div>


<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sala" id="sala" value="4">
  <label class="form-check-label" for="inlineRadio2">4</label>
  <select id="puesto2" name="puesto2" class="form-control">
  <option value=" "> </option>
       
        @foreach($salas as $sala)
        @if($sala->sala == 4 & $sala->estado == 0)
       <option value="{{ $sala->puesto }}">{{ $sala->puesto }}</option>
       @endif
       @endforeach
       </select>
</div>


      
    </div>
    
    <button class="btn btn-primary" style="margin-right:10px;">Prestar</button>

</form>


@endsection
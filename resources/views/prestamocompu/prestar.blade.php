@extends('layouts.app')

@section('content')

<h1 class="text-center">Prestar Computadoras</h1>

<form action="/guardarpres" method="GET">
@csrf

    <div class="mb-3 col-2" >
        <label for="" class="form-label">Carné</label>
        <input type="text" id="carne" name="carne" class="form-control" tabindex="1" value="{{$usuario->carne}}" readonly>
    </div>
    <div class="mb-3 col-4" >
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="1" value="{{$usuario->nombre}} {{$usuario->apellido}}" readonly>
    </div>
    <div class="mb-3 col-4" >
        <label for="" class="form-label">Facultad</label>
        <input type="text" id="facultad" name="facultad" class="form-control" tabindex="1" value="{{$usuario->facultad}}" readonly>
    </div> 
    <div class="mb-3 col-4" >
        <label for="" class="form-label">Carrera</label>
        <input type="text" id="carrera" name="carrera" class="form-control" tabindex="1" value="{{$usuario->carrera}}" readonly>
    </div>

    <div class="mb-3 col-2" >
        <label for="" class="form-label">Género</label>
        <input type="text" id="genero" name="genero" class="form-control" tabindex="1" value="{{$usuario->genero}}" readonly>
    </div>

    <div class="mb-3 col-2" >
        <label for="" class="form-label">Computadoras Libres</label>
        <select id="compu" name="compu" class="form-control">
            @foreach($compus as $compu)
                @if($compu->estado == 0)
                    <option value="{{ $compu->numero }}">{{ $compu->numero }}</option>
                @endif
            @endforeach
        </select>
    </div>
    
    <button class="btn btn-primary" style="margin-right:10px;">Prestar</button>

</form>

@endsection

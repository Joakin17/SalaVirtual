@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Prestar Salas De Estudio</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="/guardarsala" method="GET">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="carne" class="form-label">Carné</label>
                    <input type="text" id="carne" name="carne" class="form-control" value="{{$usuario->carne}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="facultad" class="form-label">Facultad</label>
                    <input type="text" id="facultad" name="facultad" class="form-control" value="{{$usuario->facultad}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <input type="text" id="genero" name="genero" class="form-control" value="{{$usuario->genero}}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{$usuario->nombre}}  {{$usuario->apellido}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="carrera" class="form-label">Carrera</label>
                    <input type="text" id="carrera" name="carrera" class="form-control" value="{{$usuario->carrera}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="sala" class="form-label">Salas Libres</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="sala" id="sala" value="3">
                        <label class="form-check-label" for="inlineCheckbox1">3</label>
                        <select id="puesto1" name="puesto1" class="form-control">
                            <option value=" "> </option>
                            @foreach($salas as $sala)
                                @if($sala->sala == 3 && $sala->estado == 0)
                                    <option value="{{ $sala->puesto }}">{{ $sala->puesto }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="sala" id="sala" value="4" >
                        <label class="form-check-label" for="inlineCheckbox2">4</label>
                        <select id="puesto2" name="puesto2" class="form-control">
                            <option value=" "> </option>
                            @foreach($salas as $sala)
                                @if($sala->sala == 4 && $sala->estado == 0)
                                    <option value="{{ $sala->puesto }}">{{ $sala->puesto }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <button class="custom-button" style="margin-right: 10px;">Prestar</button>
                    <a href="{{ route('prestamosala.index') }}" class="custom-button">Regresar a sala de estudio</a>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .custom-button {
        background-color: #9D2720;
        color: #F6C03D;
        border: none;
        padding: 8px 16px;
        margin: 5px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }
    .custom-button:hover {
        background-color: #F6C03D;
        color: #9D2720;
        transition: 0.3s;
    }
</style>
@endsection

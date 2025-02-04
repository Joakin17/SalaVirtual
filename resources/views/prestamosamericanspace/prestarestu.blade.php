@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Prestar salas de estudio de american space</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/guardarprestamoestudiante" method="GET" id="form">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="carne" class="form-label">Carné</label>
                        <input type="text" id="carne" name="carne" class="form-control" value="{{$usuario->carne}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="{{$usuario->nombre}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" value="{{$usuario->apellido}}" readonly>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="facultad" class="form-label">Facultad</label>
                        <input type="text" id="facultad" name="facultad" class="form-control" value="{{$usuario->facultad}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="carrera" class="form-label">Carrera</label>
                        <input type="text" id="carrera" name="carrera" class="form-control" value="{{$usuario->carrera}}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="genero" class="form-label">Género</label>
                        <input type="text" id="genero" name="genero" class="form-control" value="{{$usuario->genero}}" readonly>
                    </div>
                    <div class="col-md-6">

                    <div class="form-check form-check-inline">
                    <label for="mesa" class="form-label">Mesas Libres</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="mesa" id="mesa" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Mesa 1</label>
                        <select id="puesto1" name="puesto1" class="form-control">
                            <option value=" "> </option>
                            @foreach($salaspace as $mesa)
                                @if($mesa->mesa == 1 && $mesa->estado == 0)
                                    <option value="{{ $mesa->puesto }}">{{ $mesa->puesto }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="mesa" id="mesa" value="2" >
                        <label class="form-check-label" for="inlineCheckbox2">Mesa 2</label>
                        <select id="puesto2" name="puesto2" class="form-control">
                            <option value=" "> </option>
                            @foreach($salaspace as $mesa)
                                @if($mesa->mesa == 2 && $mesa->estado == 0)
                                    <option value="{{ $mesa->puesto}}">{{ $mesa->puesto }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                </div>

                <div class="col-md-12">
                <div class="mb-3">
                    <button class="custom-button" style="margin-right: 10px;">Prestar</button>
                    <a href="{{ route('prestamosspace.index') }}" class="custom-button">Regresar a sala de american space</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form').addEventListener('submit', function(event) {
                var puesto1 = document.getElementById('puesto1');
                var puesto2 = document.getElementById('puesto2');
                var mesa1Checked = document.querySelector('input[name="mesa"][value="1"]').checked;
                var mesa2Checked = document.querySelector('input[name="mesa"][value="2"]').checked;

                if ((mesa1Checked && puesto1.value.trim() === '') || (mesa2Checked && puesto2.value.trim() === '')) {
                    alert('Por favor, seleccione una mesa con su respectivo puesto');
                    event.preventDefault();
                }
                if (!mesa1Checked && !mesa2Checked) {
                    alert('Por favor, seleccione al menos una mesa con su respectivo puesto');
                    event.preventDefault();
                }
            });
        });
    </script>
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
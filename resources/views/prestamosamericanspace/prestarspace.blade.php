@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Prestar Salas de American Space</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('guardarspace') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nit" class="form-label">NIT</label>
                    <input type="text" id="nit" name="nit" class="form-control" value="{{$usuario->nit}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="institucion" class="form-label">Institución</label>
                    <input type="text" id="institucion" name="institucion" class="form-control" value="{{$usuario->institucion}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <input type="text" id="genero" name="genero" class="form-control" value="{{ $usuario->genero }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{$usuario->nombre}}"  readonly>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Género</label>
                    <input type="text" id="tipo" name="tipo" class="form-control" value="{{ $usuario->tipo }}" readonly>
                </div>
                <div class="mb-3">
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
                    <button class="btn btn-primary" style="margin-right: 10px;">Prestar</button>
                    <a href="#" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

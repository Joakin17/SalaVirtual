@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Prestamo de computadoras a usuario Externo</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('guardarspaces') }}" method="GET">
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
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" id="tipo" name="tipo" class="form-control" value="{{ $usuario->tipo }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="compu" class="form-label">Computadoras Libres</label>
                    <select id="compu" name="compu" class="form-control" >
                        @foreach($compus as $compu)
                            @if($compu->estado == 0)
                                <option value="{{ $compu->numero }}">{{ $compu->numero }}</option>
                             @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <button class="custom-button" style="margin-right: 10px;">Prestar</button>
                    <a href="{{ route('prestamocompu.index') }}" class="custom-button">Regresar a sala virtual</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Espera a que el documento esté listo
    document.addEventListener('DOMContentLoaded', function() {
        const printButton = document.getElementById('printButton');

        // Agrega un evento 'click' al botón de impresión
        printButton.addEventListener('click', function() {
            // Después de hacer clic en el botón, imprimir la página actual
            window.print();
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

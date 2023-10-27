@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center my-5">Tablas de Estadísticas</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="/estadisticacompus?year={{ date('Y') }}" class="btn btn-success btn-block py-4">
                <h2 class="mb-0">Estadísticas de Préstamos de Computadoras</h2>
            </a>
        </div>
        <div class="col-md-6">
            <a href="/estadisticasalas?year={{ date('Y') }}" class="btn btn-secondary btn-block py-4">
                <h2 class="mb-0">Estadísticas de Préstamos de Salas de Estudio</h2>
            </a>
        </div>
        <div class="col-md-6">
            <a href="/estadisticasalaspace?year={{ date('Y') }}" class="btn btn-secondary btn-block py-4">
                <h2 class="mb-0">Estadísticas de sala de american space</h2>
            </a>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Biblioteca Miguel De Cervantes Usuarios</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border border-primary">
                <img src="{{ asset('imgs/estud.jpg') }}" class="card-img-top" alt="Usuario Externo">
                <div class="card-body text-center">
                    <p class="card-text"><strong>Estudiantes</strong></p>
                </div>
                <div class="card-footer text-center">
                    <a href="/estudiante" class="btn btn-primary">ir a Usuarios Estudiante</a>
                </div>
            </div>
        </div>
        <div class="col-md-4"> 
            <div class="card border border-primary">
                <img src="{{ asset('imgs/maestro.jpg') }}" class="card-img-top" alt="Usuario externo">
                <div class="card-body text-center">
                    <p class="card-text"><strong>Usuarios Externos</strong></p>
                </div>
                <div class="card-footer text-center">
                <a href="/externo" class="btn btn-primary" >ir a Usuarios Externos</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

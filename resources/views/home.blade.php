@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50 text-center">Biblioteca Miguel de Cervantes</h1>
        <h3 class="text-black-50"></h3>
        <p></p>
        <br>
        <div class="card-deck ">
            <div class="card bg-success">
                <a href="/prestamocompus">
                    <img class="card-img-top img-thumbnail" src="/imgs/sala.jpg" alt="Card image cap" style="height: 360px;">
                    <div class="card-body">
                        <h2 class="text-center p-4">Préstamos de Computadoras</h2>
                    </div>
                </a>
                <div class="card-footer">
                    <small class="text-muted"></small>
                </div>
            </div>
            <div class="card bg-secondary">
                <a href="/prestamosalas" >
                    <img class="card-img-top" src="/imgs/estudio.jpg" alt="Card image cap" style="height: 360px;">
                    <div class="card-body">
                        <h2 class="text-center p-4">Préstamos de sala de estudio</h2>
                    </div>
                </a>
                <div class="card-footer">
                    <small class="text-muted"></small>
                </div>
            </div>
            <div class="card bg-danger">
                <a href="/estadistica">
                    <img class="card-img-top" src="/imgs/esta.jpg" alt="Card image cap" style="height: 360px;">
                    <div class="card-body">
                        <h2 class="text-center p-4">Estadísticas</h2>
                    </div>
                </a>
                <div class="card-footer">
                    <small class="text-muted"></small>
                </div>
            </div>
            <div class="card bg-danger">
                <a href="/estadistica">
                    <img class="card-img-top" src="/imgs/usu.jpg" alt="Card image cap" style="height: 360px;">
                    <div class="card-body">
                        <h2 class="text-center p-4">Usuarios</h2>
                    </div>
                </a>
                <div class="card-footer">
                    <small class="text-muted"></small>
                </div>
            </div>
        </div>
    </div>
@endsection

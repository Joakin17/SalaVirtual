@extends('layouts.app')

@section('content')
<h1 class="text-center">Biblioteca Miguel de Cervantes</h1>

<div class="cards-list">
    <a href="/estadisticacompus?year={{ date('Y') }}" class="card">
        <div class="card_image">
            <img src="/imgs/pcesta.jpg" />
        </div>
        <div class="card_content">
            <div class="card_title title-black">
                <p>Estadisticas De Sala Virtual</p>
            </div>
        </div>
    </a>

    <a href="/estadisticasalas?year={{ date('Y') }}" class="card">
        <div class="card_image">
            <img src="/imgs/salaesta.jpg" />
        </div>
        <div class="card_content">
            <div class="card_title title-black">
                <p>Estadisticas De Sala De Estudio</p>
            </div>
        </div>
    </a>

    <a href="/estadisticasalaspace?year={{ date('Y') }}" class="card">
        <div class="card_image">
            <img src="/imgs/esta.png" />
        </div>
        <div class="card_content">
            <div class="card_title title-black">
                <p>Estadísticas De Sala De American Spaces</p>
            </div>
        </div>
    </a>
</div>
<style>
    .cards-list {
        z-index: 0;
        width: 100%;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    
    }

    .card {
        margin: 30px auto;
        width: 300px;
        border-radius: 40px;
        box-shadow: 5px 5px 30px 7px rgba(0, 0, 0, 0.25), -5px -5px 30px 7px rgba(0, 0, 0, 0.22);
        cursor: pointer;
        transition: 0.4s;
        display: flex;
        flex-direction: column;
        text-align: center; 
    }

    .card .card_image {
        width: 100%;
        flex: 1; 
        border-radius: 40px 40px 0 0;
    }

    .card .card_image img {
        width: 100%;
        height: 100%;
        border-radius: 40px 40px 0 0;
        object-fit: cover;
    }

    .card .card_content {
        padding: 10px;
    }

    .card .card_title {
        font-family: sans-serif;
        font-weight: bold;
        font-size: 24px; 
        margin-top: 10px; 
        height: 60px; 
    }

    .card:hover {
        transform: scale(0.9, 0.9);
        box-shadow: 5px 5px 30px 15px rgba(0, 0, 0, 0.25), -5px -5px 30px 15px rgba(0, 0, 0, 0.22);
    }

    .title-black {
        color: black;
    }
</style>
@endsection
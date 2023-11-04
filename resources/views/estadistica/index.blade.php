@extends('layouts.app')

@section('content')
<h1 class="text-center">Biblioteca Miguel de Cervantes Estadisticas.</h1>}
<br>

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
    display: flex;
    justify-content: center; 
    flex-wrap: wrap; 
}

.card {
    margin: 2px;
    width: calc(25% - 4px); 
    max-width: 350px; 
    border-radius: 10px; 
    box-shadow: 3px 3px 10px 3px rgba(0, 0, 0, 0.1), -3px -3px 10px 3px rgba(0, 0, 0, 0.1);
    transition: 0.4s;
    display: flex;
    flex-direction: column;
    text-align: center;
}

.card .card_image {
    width: 100%;
    flex: 1;
    border-radius: 10px 10px 0 0;
}

.card .card_image img {
    width: 100%;
    height: 100%;
    border-radius: 10px 10px 0 0;
    object-fit: cover;
}


.card .card_content {
    padding: 20px; 
}

.card .card_title {
    font-family: sans-serif;
    font-weight: bold;
    font-size: 18px; 
    margin-top: 10px;
    height: 60px;
}

.card:hover {
    transform: scale(0.9, 0.9);
    box-shadow: 5px 5px 15px 10px rgba(0, 0, 0, 0.25), -5px -5px 15px 10px rgba(0, 0, 0, 0.22);
}

.title-black {
    color: black;
}

</style>
@endsection
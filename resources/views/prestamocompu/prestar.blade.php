@extends('layouts.app')

@section('content')


<form action="/pedidos/{{$usuario->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 col-6" >
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="vende" name="vende" class="form-control" tabindex="1" value=" {{$usuario->nombre}} ">
    </div>



@endsection
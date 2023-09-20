@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('prestamocompus.showedit', '1') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Buscar Usuario a editar</label>
                    <input type="text" class="form-control" id="carne" name="carne" placeholder="Ingresar carné">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right:10px;">Editar usuario</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
    <h1 class="text-center">Biblioteca Miguel De Cervantes Usuarios Externo</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border border-primary">
                <img src="{{ asset('imgs/add.png') }}" class="card-img-top" alt="Agregar Usuario">
                <div class="card-body text-center">
                    <p class="card-text"><strong>Agregar Usuario Externo</strong></p>
                </div>
                <div class="card-footer text-center">
                    <a href="/agregaru" class="btn btn-primary">Agregar Usuario Extermp</a>
                </div>
            </div>
        </div>
        <div class="col-md-4"> 
            <div class="card border border-primary">
                <img src="{{ asset('imgs/edit.jpg') }}" class="card-img-top" alt="Editar Usuario">
                <div class="card-body text-center">
                    <p class="card-text"><strong>Editar Usuario Externo</strong></p>
                </div>
                <div class="card-footer text-center">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar Usuario Externo</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<h1 class="text-center">El usuario no existe</h1>
<h3 class="text-center">Agregar usuario</h3>

<form action="/guardaruser" method="GET">
@csrf

    <div class="mb-3 col-2" >
        <label for="" class="form-label">Carné</label>
        <input type="text" id="carne" name="carne" class="form-control" tabindex="1"  >
    </div>
    <div class="mb-3 col-4" >
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control"  >
    </div>
    <div class="mb-3 col-4" >
        <label for="" class="form-label">Facultad</label>
        <select id="facultad" name="facultad" class="form-control">
       <option value="FACULTAD DE CIENCIAS EMPRESARIALES">FACULTAD DE CIENCIAS EMPRESARIALES</option>
       <option value="FACULTAD DE INGENIERIA Y ARQUITECTURA">FACULTAD DE INGENIERIA Y ARQUITECTURA</option>
       <option value="FACULTAD DE CIENCIAS Y HUMANIDADES">FACULTAD DE CIENCIAS Y HUMANIDADES</option>
       <option value="FACULTAD DE CIENCIA DE LA SALUD">FACULTAD DE CIENCIA DE LA SALUD</option>
       <option value="Escuela de Posgrados">ESCUELA DE POSGRADOS</option>
       </select>
        
        </div> 
        <div class="mb-3 col-4" >
        <label for="" class="form-label">Carrera</label>
        <select id="carrera" name="carrera" class="form-control">
        <option value="Licenciatura en Idioma Ingles" selected >Licenciatura en Idioma Ingles</option>
    <option value="Licenciatura en periodismo y comunicación audiovisual">Licenciatura en periodismo y comunicación audiovisual</option>
   <option value="Licenciatura en enfermeria">Licenciatura en enfermeria</option>
   <option value="Tecnico en enfermeria">Tecnico en enfermeria</option>
   <option value="Licenciatura en ciencias de la educacion con especialidad en idioma inglés">Licenciatura en ciencias de la educacion con especialidad en idioma inglés</option>
   <option value="Doctorado en medicina">Doctorado en medicina</option>
   <option value="Licenciatura en ciencias de la educacion con especialidad en educacion basica">Licenciatura en ciencias de la educacion con especialidad en educacion basica</option>
   <option value="Profesorado en educacion basica para primero y segundo ciclo">Profesorado en educacion basica para primero y segundo ciclo</option>
   <option value="Profesorado en educación parvularia">Profesorado en educación parvularia</option>
   <option value="Licenciatura en ciencias religiosas">Licenciatura en ciencias religiosas</option>
   <option value="Licenciatura en ciencias de la educacion con especialidad en educacion parvularia">Licenciatura en ciencias de la educacion con especialidad en educacion parvularia</option>
   <option value="Licenciatura en educacion inicial y  parvularia">Licenciatura en educacion inicial y  parvularia</option>
   <option value="Licenciatura en ciencias de la educacion especialidad en matematica semipresencial">Licenciatura en ciencias de la educacion especialidad en matematica semipresencial</option>
   <option value="Licenciatura en ciencias de la educacion especialidad en direccion y administracion escolar - semipresencial">Licenciatura en ciencias de la educacion especialidad en direccion y administracion escolar - semipresencial</option>
   <option value="Licenciatura en ciencias de la educacion especialidad en educacion basica semipresencial">Licenciatura en ciencias de la educacion especialidad en educacion basica semipresencial</option>
   <option value="Licenciatura en idioma ingles (semipresencial)">Licenciatura en idioma ingles (semipresencial)</option>
   <option value="Profesorado en educacion  basica para primero y segundo ciclos">Profesorado en educacion  basica para primero y segundo ciclos</option>
   <option value="Profesorado y licenciatura en educacion inicial y parvularia">Profesorado y licenciatura en educacion inicial y parvularia</option>
   <option value="Licenciatura en idioma ingles">Licenciatura en idioma ingles</option>
   <option value="Licenciatura en diseño grafico publicitario">Licenciatura en diseño grafico publicitario</option>
   <option value="Ingenieria en tecnologia y procesamiento de alimentos">Ingenieria en tecnologia y procesamiento de alimentos</option>
   <option value="Licenciatura en ciencias juridicas">Licenciatura en ciencias juridicas</option>
   <option value="Licenciatura en sistemas informaticos administrativos">Licenciatura en sistemas informaticos administrativos</option>
   <option value="Ingenieria industrial">Ingenieria industrial</option>
   <option value="Arquitectura">Arquitectura</option>
   <option value="Ingenieria civil">Ingenieria civil</option>
   <option value="Ingenieria civil saneamiento ambiental">Ingenieria civil saneamiento ambiental</option>
   <option value="Ingenieria en sistemas informaticos">Ingenieria en sistemas informaticos</option>
   <option value="Ingenieria agronomica">Ingenieria agronomica</option>
   <option value="Ingenieria en telecomunicaciones y redes">Ingenieria en telecomunicaciones y redes</option>
   <option value="Ingenieria en desarrollo de software">Ingenieria en desarrollo de software</option>
   <option value="Curso ccna academia de redes cisco unicaes">Curso ccna academia de redes cisco unicaes</option>
   <option value="Curso ccna academia de redes cisco unicaes">Curso ccna academia de redes cisco unicaes</option>
   <option value="Licenciatura en administracion de empresas">Licenciatura en administracion de empresas</option>
   <option value="Licenciatura en mercadeo y negocios internacionales">Licenciatura en mercadeo y negocios internacionales</option>
   <option value="Licenciatura en gestion y desarrollo turistico">Licenciatura en gestion y desarrollo turistico</option>
   <option value="Licenciatura en contaduria publica">Licenciatura en contaduria publica</option>
   <option value="Postgrado en estrategias para la competitividad">Postgrado en estrategias para la competitividad</option>
   <option value="Maestria en direccion estrategica de empresas">Maestria en direccion estrategica de empresas</option>
   <option value="Maestria en asesoria educativa">Maestria en asesoria educativa</option>
   <option value="Maestria en atencion integral de la primera infancia">Maestria en atencion integral de la primera infancia</option>
   <option value="Maestria en gerencia y gestion ambiental">Maestria en gerencia y gestion ambiental</option>
   <option value="Maestria en gestion y desarrollo turistico">Maestria en gestion y desarrollo turistico</option>
   <option value="Curso de formacion pedagica para profesionales">Curso de formacion pedagica para profesionales</option>
   <option value="Licenciatura en administracion de empresas - semipresencial">Licenciatura en administracion de empresas - semipresencial</option>
   </select>
    </div>

    <div class="mb-3 col-2" >
        <label for="" class="form-label">Género</label>
        <select id="genero" name="genero" class="form-control">
       <option value="F">F</option>
       <option value="M">M</option>
       </select>
    </div>
    


    <button class="btn btn-primary" style="margin-right:10px;">Guardar</button>

</form>


@endsection
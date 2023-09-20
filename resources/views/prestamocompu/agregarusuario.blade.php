@extends('layouts.app')

@section('content')

<h3 class="text-center">Agregar usuario</h3>

<form id="userForm" action="/guardaruser" method="GET" onsubmit="return validarFormulario()">
@csrf

    <div class="mb-3 col-2" >
        <label for="carne" class="form-label">Carné</label>
        <input type="text" id="carne" name="carne" class="form-control" tabindex="1">
    </div>
    <div class="mb-3 col-4" >
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control">
    </div>
    <div class="mb-3 col-4" >
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" id="apellido" name="apellido" class="form-control">
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
            <option value="Licenciatura en Administración de Empresas">Licenciatura en Administración de Empresas</option>
            <option value="Licenciatura en Administración de Empresas (Semipresencial)">Licenciatura en Administración de Empresas (Semipresencial)</option>
            <option value="Licenciatura en Sistemas Informáticos Administrativos">Licenciatura en Sistemas Informáticos Administrativos</option>
            <option value="Licenciatura en Contaduría Pública">Licenciatura en Contaduría Pública</option>
            <option value="Licenciatura en Mercadeo y Negocios Internacionales">Licenciatura en Mercadeo y Negocios Internacionales</option>
            <option value="Licenciatura en Gestión y Desarrollo Turístico">Licenciatura en Gestión y Desarrollo Turístico</option>
            <option value="Licenciatura en Gestión de Negocios Digitales">Licenciatura en Gestión de Negocios Digitales</option>
            <option value="Licenciatura en Relaciones Internacionales y Comercio Exterior">Licenciatura en Relaciones Internacionales y Comercio Exterior</option>
            <option value="Doctorado en Medicina">Doctorado en Medicina</option>
            <option value="Licenciatura en Enfermería">Licenciatura en Enfermería</option>
            <option value="Técnico en Enfermería">Técnico en Enfermería</option>
            <option value="Licenciatura en Nutrición y Dietética">Licenciatura en Nutrición y Dietética</option>
            <option value="Ingeniería Química">Ingeniería Química</option>
            <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
            <option value="Ingeniería en Desarrollo de Software">Ingeniería en Desarrollo de Software</option>
            <option value="Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)">Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)</option>
            <option value="Ingeniería en Telecomunicaciones y Redes">Ingeniería en Telecomunicaciones y Redes</option>
            <option value="Arquitectura">Arquitectura</option>
            <option value="Ingeniería Civil">Ingeniería Civil</option>
            <option value="Ingeniería en Sistemas Informáticos">Ingeniería en Sistemas Informáticos</option>
            <option value="Ingeniería Agronómica">Ingeniería Agronómica</option>
            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
            <option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option>
            <option value="Ingeniería en procesos textiles">Ingeniería en procesos textiles</option>
            <option value="Técnico en textiles">Técnico en textiles</option>
            <option value="Licenciatura en Diseño Gráfico Publicitario">Licenciatura en Diseño Gráfico Publicitario</option>
            <option value="Licenciatura en Ciencias Jurídicas">Licenciatura en Ciencias Jurídicas</option>
            <option value="Licenciatura en Periodismo y Comunicación Audiovisual">Licenciatura en Periodismo y Comunicación Audiovisual</option>
            <option value="Licenciatura en Idioma Inglés">Licenciatura en Idioma Inglés</option>
            <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica">Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica</option>
            <option value="Licenciatura en Ciencias de la Educación con Especialidad en educacion parvularia">Licenciatura en Ciencias de la Educación con Especialidad en Educación Parvularia</option>
            <option value="Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés">Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés</option>
            <option value="Licenciatura en Ciencias Religiosas">Licenciatura en Ciencias Religiosas</option>
            <option value="Licenciatura en Idioma Inglés (Semi presencial)">Licenciatura en Idioma Inglés (Semi presencial)</option>
            <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)">Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)</option>
            <option value="Licenciatura en Ciencias de la Educación Especialidad en Matemática">Licenciatura en Ciencias de la Educación Especialidad en Matemática</option>
            <option value="Licenciatura en Ciencias de la Educación Especialidad en Matemática">Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)</option>
            <option value="Maestría en Asesoría Educativa">Maestría en Asesoría Educativa</option>
            <option value="Maestría en Dirección Estratégica de Empresas">Maestría en Dirección Estratégica de Empresas</option>
            <option value="Maestría en Gerencia y Gestión Ambiental">Maestría en Gerencia y Gestión Ambiental</option>
            <option value="Maestría en Investigación Educativa">Maestría en Investigación Educativa</option>
            <option value="Maestría en Seguridad Informática">Maestría en Seguridad Informática</option>
            <option value="Maestría en Atención Integral de la Primera Infancia">Maestría en Atención Integral de la Primera Infancia</option>
            <option value="Doctorado en Educación">Doctorado en Educación</option>
            <option value="Técnico en Lácteos y Cárnicos">Técnico en Lácteos y Cárnicos</option>
            <option value="Técnico en Gestión y Desarrollo Turístico">Técnico en Gestión y Desarrollo Turístico</option>
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

<script>
function validarFormulario() {
    var carne = document.getElementById("carne").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;

    if (carne === "" || nombre === "" || apellido === "") {
        alert("Por favor, complete todos los campos obligatorios.");
        return false; // Evita que se envíe el formulario si hay campos vacíos.
    }

    // Si todos los campos obligatorios están completos, el formulario se enviará.
    return true;
}
</script>

@endsection
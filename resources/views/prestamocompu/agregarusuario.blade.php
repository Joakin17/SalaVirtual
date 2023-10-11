@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Usuario</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/guardaruser" method="GET" >
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="carne" class="form-label">Carné</label>
                        <input type="text" id="carne" name="carne" class="form-control" tabindex="1" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="facultad" class="form-label">Facultad</label>
                        <select id="facultad" name="facultad" class="form-control">
                            <option value="FACULTAD DE CIENCIAS EMPRESARIALES">FACULTAD DE CIENCIAS EMPRESARIALES</option>
                            <option value="FACULTAD DE INGENIERIA Y ARQUITECTURA">FACULTAD DE INGENIERIA Y ARQUITECTURA</option>
                            <option value="FACULTAD DE CIENCIAS Y HUMANIDADES">FACULTAD DE CIENCIAS Y HUMANIDADES</option>
                            <option value="FACULTAD DE CIENCIA DE LA SALUD">FACULTAD DE CIENCIAS DE LA SALUD</option>
                            <option value="Escuela de Posgrados">ESCUELA DE POSGRADOS</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="carrera" class="form-label">Carrera</label>
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
                    <div class="col-md-6">
                        <label for="genero" class="form-label">Género</label>
                        <select id="genero" name="genero" class="form-control">
                        <option value="F" >Femenino</option>
                        <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-md-6">
                        <a href="/usuarios" class="btn btn-secondary">Regresar a Usuarios</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Usuario</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('prestamocompus.update', $usuario->id) }}" method="POST" >
                @csrf
                @method('PUT') <!-- Utiliza el método PUT para actualizar el registro -->

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="carne" class="form-label">Carné</label>
                        <input type="text" id="carne" name="carne" class="form-control" tabindex="1" value="{{$usuario->carne}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" tabindex="2" value="{{$usuario->nombre}}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" tabindex="3" value="{{$usuario->apellido}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="facultad" class="form-label">Facultad</label>
                        <select id="facultad" name="facultad" class="form-control" tabindex="4">
                            <option value="FACULTAD DE CIENCIAS EMPRESARIALES" {{$usuario->facultad == 'FACULTAD DE CIENCIAS EMPRESARIALES' ? 'selected' : ''}}>FACULTAD DE CIENCIAS EMPRESARIALES</option>
                            <option value="FACULTAD DE INGENIERIA Y ARQUITECTURA" {{$usuario->facultad == 'FACULTAD DE INGENIERIA Y ARQUITECTURA' ? 'selected' : ''}}>FACULTAD DE INGENIERIA Y ARQUITECTURA</option>
                            <option value="FACULTAD DE CIENCIAS Y HUMANIDADES" {{$usuario->facultad == 'FACULTAD DE CIENCIAS Y HUMANIDADES' ? 'selected' : ''}}>FACULTAD DE CIENCIAS Y HUMANIDADES</option>
                            <option value="FACULTAD DE CIENCIAS DE LA SALUD" {{$usuario->facultad == 'FACULTAD DE CIENCIAS DE LA SALUD' ? 'selected' : ''}}>FACULTAD DE CIENCIAS DE LA SALUD</option>
                            <option value="ESCUELA DE POSGRADOS" {{$usuario->facultad == 'ESCUELA DE POSGRADOS' ? 'selected' : ''}}>ESCUELA DE POSGRADOS</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="carrera" class="form-label">Carrera</label>
                        <select id="carrera" name="carrera" class="form-control" tabindex="5">
                            <option value="Licenciatura en Administración de Empresas" {{ $usuario->carrera == 'Licenciatura en Administración de Empresas' ? 'selected' : '' }}>Licenciatura en Administración de Empresas</option>
                            <option value="Licenciatura en Administración de Empresas (Semipresencial)" {{ $usuario->carrera == 'Licenciatura en Administración de Empresas (Semipresencial)' ? 'selected' : '' }}>Licenciatura en Administración de Empresas (Semipresencial)</option>
                            <option value="Licenciatura en Sistemas Informáticos Administrativos" {{ $usuario->carrera == 'Licenciatura en Sistemas Informáticos Administrativos' ? 'selected' : '' }}>Licenciatura en Sistemas Informáticos Administrativos</option>
                            <option value="Licenciatura en Contaduría Pública" {{ $usuario->carrera == 'Licenciatura en Contaduría Pública' ? 'selected' : '' }}>Licenciatura en Contaduría Pública</option>
                            <option value="Licenciatura en Mercadeo y Negocios Internacionales" {{ $usuario->carrera == 'Licenciatura en Mercadeo y Negocios Internacionales' ? 'selected' : '' }}>Licenciatura en Mercadeo y Negocios Internacionales</option>
                            <option value="Licenciatura en Gestión y Desarrollo Turístico" {{ $usuario->carrera == 'Licenciatura en Gestión y Desarrollo Turístico' ? 'selected' : '' }}>Licenciatura en Gestión y Desarrollo Turístico</option>
                            <option value="Licenciatura en Gestión de Negocios Digitales" {{ $usuario->carrera == 'Licenciatura en Gestión de Negocios Digitales' ? 'selected' : '' }}>Licenciatura en Gestión de Negocios Digitales</option>
                            <option value="Licenciatura en Relaciones Internacionales y Comercio Exterior" {{ $usuario->carrera == 'Licenciatura en Relaciones Internacionales y Comercio Exterior' ? 'selected' : '' }}>Licenciatura en Relaciones Internacionales y Comercio Exterior</option>
                            <option value="Doctorado en Medicina" {{ $usuario->carrera == 'Doctorado en Medicina' ? 'selected' : '' }}>Doctorado en Medicina</option>
                            <option value="Licenciatura en Enfermería" {{ $usuario->carrera == 'Licenciatura en Enfermería' ? 'selected' : '' }}>Licenciatura en Enfermería</option>
                            <option value="Técnico en Enfermería" {{ $usuario->carrera == 'Técnico en Enfermería' ? 'selected' : '' }}>Técnico en Enfermería</option>
                            <option value="Licenciatura en Nutrición y Dietética" {{ $usuario->carrera == 'Licenciatura en Nutrición y Dietética' ? 'selected' : '' }}>Licenciatura en Nutrición y Dietética</option>
                            <option value="Ingeniería Química" {{ $usuario->carrera == 'Ingeniería Química' ? 'selected' : '' }}>Ingeniería Química</option>
                            <option value="Ingeniería Mecánica" {{ $usuario->carrera == 'Ingeniería Mecánica' ? 'selected' : '' }}>Ingeniería Mecánica</option>
                            <option value="Ingeniería en Desarrollo de Software" {{ $usuario->carrera == 'Ingeniería en Desarrollo de Software' ? 'selected' : '' }}>Ingeniería en Desarrollo de Software</option>
                            <option value="Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)" {{ $usuario->carrera == 'Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)' ? 'selected' : '' }}>Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)</option>
                            <option value="Ingeniería en Telecomunicaciones y Redes" {{ $usuario->carrera == 'Ingeniería en Telecomunicaciones y Redes' ? 'selected' : '' }}>Ingeniería en Telecomunicaciones y Redes</option>
                            <option value="Arquitectura" {{ $usuario->carrera == 'Arquitectura' ? 'selected' : '' }}>Arquitectura</option>
                            <option value="Ingeniería Civil" {{ $usuario->carrera == 'Ingeniería Civil' ? 'selected' : '' }}>Ingeniería Civil</option>
                            <option value="Ingeniería en Sistemas Informáticos" {{ $usuario->carrera == 'Ingeniería en Sistemas Informáticos' ? 'selected' : '' }}>Ingeniería en Sistemas Informáticos</option>
                            <option value="Ingeniería Agronómica" {{ $usuario->carrera == 'Ingeniería Agronómica' ? 'selected' : '' }}>Ingeniería Agronómica</option>
                            <option value="Ingeniería Industrial" {{ $usuario->carrera == 'Ingeniería Industrial' ? 'selected' : '' }}>Ingeniería Industrial</option>
                            <option value="Ingeniería Eléctrica" {{ $usuario->carrera == 'Ingeniería Eléctrica' ? 'selected' : '' }}>Ingeniería Eléctrica</option>
                            <option value="Ingeniería en procesos textiles" {{ $usuario->carrera == 'Ingeniería en procesos textiles' ? 'selected' : '' }}>Ingeniería en procesos textiles</option>
                            <option value="Técnico en textiles" {{ $usuario->carrera == 'Técnico en textiles' ? 'selected' : '' }}>Técnico en textiles</option>
                            <option value="Licenciatura en Diseño Gráfico Publicitario" {{ $usuario->carrera == 'Licenciatura en Diseño Gráfico Publicitario' ? 'selected' : '' }}>Licenciatura en Diseño Gráfico Publicitario</option>
                            <option value="Licenciatura en Ciencias Jurídicas" {{ $usuario->carrera == 'Licenciatura en Ciencias Jurídicas' ? 'selected' : '' }}>Licenciatura en Ciencias Jurídicas</option>
                            <option value="Licenciatura en Periodismo y Comunicación Audiovisual" {{ $usuario->carrera == 'Licenciatura en Periodismo y Comunicación Audiovisual' ? 'selected' : '' }}>Licenciatura en Periodismo y Comunicación Audiovisual</option>
                            <option value="Licenciatura en Idioma Inglés" {{ $usuario->carrera == 'Licenciatura en Idioma Inglés' ? 'selected' : '' }}>Licenciatura en Idioma Inglés</option>
                            <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica" {{ $usuario->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica</option>
                            <option value="Licenciatura en Ciencias de la Educación con Especialidad en educacion parvularia" {{ $usuario->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Educación Parvularia' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Educación Parvularia</option>
                            <option value="Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés" {{ $usuario->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés</option>
                            <option value="Licenciatura en Ciencias Religiosas" {{ $usuario->carrera == 'Licenciatura en Ciencias Religiosas' ? 'selected' : '' }}>Licenciatura en Ciencias Religiosas</option>
                            <option value="Licenciatura en Idioma Inglés (Semi presencial)" {{ $usuario->carrera == 'Licenciatura en Idioma Inglés (Semi presencial)' ? 'selected' : '' }}>Licenciatura en Idioma Inglés (Semi presencial)</option>
                            <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)" {{ $usuario->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)</option>
                            <option value="Licenciatura en Ciencias de la Educación Especialidad en Matemática" {{ $usuario->carrera == 'Licenciatura en Ciencias de la Educación Especialidad en Matemática' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación Especialidad en Matemática</option>
                            <option value="Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)" {{ $usuario->carrera == 'Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)</option>
                            <option value="Maestría en Asesoría Educativa" {{ $usuario->carrera == 'Maestría en Asesoría Educativa' ? 'selected' : '' }}>Maestría en Asesoría Educativa</option>
                            <option value="Maestría en Dirección Estratégica de Empresas" {{ $usuario->carrera == 'Maestría en Dirección Estratégica de Empresas' ? 'selected' : '' }}>Maestría en Dirección Estratégica de Empresas</option>
                            <option value="Maestría en Gerencia y Gestión Ambiental" {{ $usuario->carrera == 'Maestría en Gerencia y Gestión Ambiental' ? 'selected' : '' }}>Maestría en Gerencia y Gestión Ambiental</option>
                            <option value="Maestría en Investigación Educativa" {{ $usuario->carrera == 'Maestría en Investigación Educativa' ? 'selected' : '' }}>Maestría en Investigación Educativa</option>
                            <option value="Maestría en Seguridad Informática" {{ $usuario->carrera == 'Maestría en Seguridad Informática' ? 'selected' : '' }}>Maestría en Seguridad Informática</option>
                            <option value="Maestría en Atención Integral de la Primera Infancia" {{ $usuario->carrera == 'Maestría en Atención Integral de la Primera Infancia' ? 'selected' : '' }}>Maestría en Atención Integral de la Primera Infancia</option>
                            <option value="Doctorado en Educación" {{ $usuario->carrera == 'Doctorado en Educación' ? 'selected' : '' }}>Doctorado en Educación</option>
                            <option value="Técnico en Lácteos y Cárnicos" {{ $usuario->carrera == 'Técnico en Lácteos y Cárnicos' ? 'selected' : '' }}>Técnico en Lácteos y Cárnicos</option>
                            <option value="Técnico en Gestión y Desarrollo Turístico" {{ $usuario->carrera == 'Técnico en Gestión y Desarrollo Turístico' ? 'selected' : '' }}>Técnico en Gestión y Desarrollo Turístico</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="genero" class="form-label">Género</label>
                        <select id="genero" name="genero" class="form-control" tabindex="6">
                            <option value="F" {{$usuario->genero == 'F' ? 'selected' : ''}}>Femenino</option>
                            <option value="M" {{$usuario->genero == 'M' ? 'selected' : ''}}>Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary">Actualizar Usuario</button>
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

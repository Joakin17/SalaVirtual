<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamosspace;
use App\Models\UsuarioExterno; 
use App\Models\Salaspace; 
use App\Models\Estadisticasalaspace;
use App\Models\Usuario;
use App\Models\PrestamoSpaceEstudiante;
class PrestamosspaceController extends Controller
{
    public function index()
    {
        $prestamosspace = Prestamosspace::all();
        $prestamosEstudiantes = PrestamoSpaceEstudiante::all(); // Obtener todos los préstamos de estudiantes
        $usuarioExterno = UsuarioExterno::all();
        return view('prestamosamericanspace.index', ['prestamosspace' => $prestamosspace, 'prestamosEstudiantes' => $prestamosEstudiantes,
        ]);
    }
    
    public function guardarspace(Request $request)
    {
        $nit = $request->get('nit');
    
        $prestamoExistente = Prestamosspace::where('nit', $nit)->first();
    
        if ($prestamoExistente) {

            return redirect()->back()->with('error', 'Ya existe un préstamo con este NIT.');
        }
        $prestamo = new Prestamosspace();
        $prestamo->nit = $nit;
        $prestamo->nombre = $request->get('nombre');
        $prestamo->institucion = $request->get('institucion');
        $prestamo->genero = $request->get('genero');
        $prestamo->mesa = $request->get('mesa'); 
    
        $mesa = $request->get('mesa');
        if ($mesa == 1) {
            $prestamo->puesto = $request->get('puesto1');
            $puesto = $request->get('puesto1');
        } elseif ($mesa == 2) {
            $prestamo->puesto = $request->get('puesto2');
            $puesto = $request->get('puesto2');
        }
    
        $prestamo->tipo = $request->get('tipo');
        $prestamo->hora_entrada = now();
    
        $prestamo->save();

        $salap = Salaspace::where('mesa', $mesa)
            ->where('puesto', $puesto)
            ->first();
    
        if ($salap) {
            $salap->estado = 1;
            $salap->save();
        }
    
        $prestamosspace = Prestamosspace::all();
        $usuarioExterno = UsuarioExterno::all();
    
        return redirect()->route('prestamosspace.index');
    }

    public function guardarPrestamoEstudiante(Request $request)
{
    $carnet = $request->get('carne');
    $prestamoExistente = PrestamoSpaceEstudiante::where('carnet', $carnet)->first();

    if ($prestamoExistente) {
        return redirect()->back()->with('error', 'Ya existe un préstamo con este carnet.');
    }

    $prestamoEstudiante = new PrestamoSpaceEstudiante();
    $prestamoEstudiante->carnet = $carnet;
    $prestamoEstudiante->nombre = $request->get('nombre');
    $prestamoEstudiante->apellido = $request->input('apellido');
    $prestamoEstudiante->facultad = $request->get('facultad');
    $prestamoEstudiante->carrera = $request->get('carrera');
    $prestamoEstudiante->genero = $request->get('genero');
    $prestamoEstudiante->mesa = $request->get('mesa');

    $mesa = $request->get('mesa');
    $puesto = $request->get("puesto$mesa"); // Obtener el puesto basado en la mesa

    $prestamoEstudiante->puesto = $puesto;
    $prestamoEstudiante->hora_entrada = now();
    $prestamoEstudiante->save();

    $salaSpace = Salaspace::where('mesa', $request->get('mesa'))->where('puesto', $puesto)->first();

    if ($salaSpace) {
        $salaSpace->estado = 1;
        $salaSpace->save();
    }

    return redirect()->route('prestamosspace.index');
}

    

    public function liberarspace($id)
    {
        $prestamo = Prestamosspace::find($id);
    
        $mesa = $prestamo->mesa;
        $puesto = $prestamo->puesto;
    
        $salap = Salaspace::where('mesa', $mesa)
            ->where('puesto', $puesto)
            ->first();
    
        if ($salap) {
            $salap->estado = 0;
            $salap->save();
            
            // Creación de la estadística en la tabla Estadisticasalaspace
            $estadisticaSalaSpace = new Estadisticasalaspace();
            $estadisticaSalaSpace->mesa = $mesa;
            $estadisticaSalaSpace->puesto = $puesto;
            $estadisticaSalaSpace->nombre = $prestamo->nombre; // Asegúrate de tener el dato correspondiente en Prestamosspace
            $estadisticaSalaSpace->carnet = $prestamo->nit; // Asegúrate de tener el dato correspondiente en Prestamosspace
            $estadisticaSalaSpace->facultad = 'Usuario Externo'; // Asegúrate de tener el dato correspondiente en Prestamosspace
            $estadisticaSalaSpace->carrera = $prestamo->institucion; // Sustituye 'ValorCarrera' por el dato correspondiente
            $estadisticaSalaSpace->genero = $prestamo->genero; // Asegúrate de tener el dato correspondiente en Prestamosspace
            $estadisticaSalaSpace->save();
        }
    
        $prestamo->delete();
    
        return redirect('/prestamosspace');
    }

    public function liberarEstudiante($id)
    {
        $prestamoEstudiante = PrestamoSpaceEstudiante::find($id);
        
        $mesa = $prestamoEstudiante->mesa;
        $puesto = $prestamoEstudiante->puesto;
        
        $salaSpace = Salaspace::where('mesa', $mesa)->where('puesto', $puesto)->first();
        
        if ($salaSpace) {
            $salaSpace->estado = 0;
            $salaSpace->save();
            
            // Crear estadística en la tabla Estadisticasalaspace para el estudiante
            $estadisticaSalaSpace = new Estadisticasalaspace();
            $estadisticaSalaSpace->mesa = $mesa;
            $estadisticaSalaSpace->puesto = $puesto;
            $estadisticaSalaSpace->nombre = $prestamoEstudiante->nombre; // Asegúrate de tener el dato correcto
            $estadisticaSalaSpace->carnet = $prestamoEstudiante->carnet; // Asegúrate de tener el dato correcto
            $estadisticaSalaSpace->facultad = $prestamoEstudiante->facultad; // Asegúrate de tener el dato correcto
            $estadisticaSalaSpace->carrera = $prestamoEstudiante->carrera; // Asegúrate de tener el dato correcto
            $estadisticaSalaSpace->genero = $prestamoEstudiante->genero; // Asegúrate de tener el dato correcto
            $estadisticaSalaSpace->save();
        }
        
        $prestamoEstudiante->delete();
        
        return redirect()->route('prestamosspace.index');
    }


    public function showspace(Request $request)
    {
        $busca = $request->get('Nit'); 
        $usuario = UsuarioExterno::where('Nit', $busca)->first(); 
    
        if (!$usuario) {
            return view('usuario.agregarusuarioext')->with(['busca' => $busca]);
        }
    
        $salaspace = Salaspace::all();
        return view('prestamosamericanspace.prestarspace', ['usuario' => $usuario, 'salaspace' => $salaspace]);
    }
    
    public function showestu(Request $request)
    {
        $busca = $request->get('carne');
        $usuario = Usuario::where('carne', $busca)->first();
        
        if ($usuario == false) {
            return view('prestamocompu.agregarusuario')->with(['busca' => $busca]);
        } else {
            $salaspace = Salaspace::all(); // Obtener los datos de Salaspace
            return view('prestamosamericanspace.prestarestu', ['usuario' => $usuario, 'salaspace' => $salaspace]);
        }
    }
    
}

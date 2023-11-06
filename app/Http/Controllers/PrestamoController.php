<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Usuario;
use App\Models\Compu;
use App\Models\Estadistica;
use App\Models\UsuarioExterno; 
use App\Models\PrestamosPcSpace; 
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class PrestamoController extends Controller
{

    public function index()
{
    $prestamospc = Prestamo::all();
    $prestamospcspa =  PrestamosPcSpace::all();
    $usuarios = Usuario::all();
    return view('prestamocompu.index')->with(['prestamospc' => $prestamospc, 'prestamospcspace' => $prestamospcspa]);
}


    //esta funcion de guardar el prestamo de la compue que se muestra en la tabla de vista sala virtual
    public function guardar(Request $request)
    {

        $carnet = $request->get('carne');
        
        $prestamoExistente = Prestamo::where('carne', $carnet)->first();
    
        if ($prestamoExistente) {
            return redirect()->back()->with('error', 'Ya existe un préstamo con este carnet.');
        }
       
        $prestamos = new Prestamo();
        $prestamos->carne = $carnet;
        $prestamos->nombre = $request->get('nombre');
        $prestamos->facultad = $request->get('facultad');
        $prestamos->carrera = $request->get('carrera');
        $prestamos->genero = $request->get('genero');
        $prestamos->pc = $request->get('compu');
        
        // Captura la hora actual y guárdala en el campo hora_prestamo
        // Configura la zona horaria a El Salvador
        date_default_timezone_set('America/El_Salvador');
        $prestamos->hora_prestamo = now()->format('H:i'); 

        
        $prestamos->save();
    
        $compu = Compu::find($request->get('compu'));
        $compu->estado = 1;
        $compu->save();
    
        $carne = $request->get('carne');
        $nombre = $request->get('nombre');
        $numeroPc = $request->get('compu');
        $facultad = $request->get('facultad');
        $carrera = $request->get('carrera');
        $horaEntrada = now()->format('H:i'); // Obtener la hora actual
    
        return view('prestamocompu.ticket', [
            'carne' => $carne,
            'nombre' => $nombre,
            'numeroPc' => $numeroPc,
            'facultad' => $facultad,
            'carrera' => $carrera,
            'horaEntrada' => $horaEntrada
        ]);
    }

    public function guardarspaces(Request $request)
    {
        $nit = $request->get('nit');
    
        // Validación de existencia de un préstamo con el mismo 'nit'
        $prestamoExistente = PrestamosPcSpace::where('nit', $nit)->first();
    
        if ($prestamoExistente) {
            return redirect()->back()->with('error', 'Ya existe un préstamo con este NIT.');
        }
    
        $prestamospcspace = new PrestamosPcSpace();
        $prestamospcspace->nit = $nit;
        $prestamospcspace->nombre = $request->get('nombre');
        $prestamospcspace->institucion = $request->get('institucion');
        $prestamospcspace->tipo = $request->get('tipo');
        $prestamospcspace->genero = $request->get('genero');
        $prestamospcspace->pc = $request->get('compu');
        
        // Captura la hora actual y guárdala en el campo hora_prestamo
        // Configura la zona horaria a El Salvador
        date_default_timezone_set('America/El_Salvador');
        $prestamospcspace->hora_prestamo = now()->format('H:i');
    
        $prestamospcspace->save();
    
        // Actualiza el estado de la computadora a prestada
        $compu = Compu::find($request->get('compu'));
        $compu->estado = 1;
        $compu->save();
    
        $prestamospcspace = PrestamosPcSpace::all();
    
        // Envía los datos a la vista 'prestamocompu.index'
        $nit = $request->get('nit');
        $nombre = $request->get('nombre');
        $numeroPc = $request->get('compu');
        $horaEntrada = now()->format('H:i'); // Obtener la hora actual
    return view('prestamocompu.ticketspace', [
        'nit' => $nit,
        'nombre' => $nombre,
        'numeroPc' => $numeroPc,
        'horaEntrada' => $horaEntrada,

    ]);
}
    

    //esta funcion es para guardar el usuario desde el formulario de agregar usuario.
    public function guardaruser(Request $request)
    {
        // Obtén el carné del formulario
        $carne = $request->get('carne');
    
        // Verifica si ya existe un usuario con el mismo carné
        $usuarioExistente = Usuario::where('carne', $carne)->first();
    
        if ($usuarioExistente) {
            // El usuario ya existe, muestra un mensaje de error o realiza la acción que desees.
            return redirect()->back()->with('error', 'El carné ya está registrado.');
        }
    
        // Si no existe, crea un nuevo usuario
        $prestamos = new Usuario();
        $prestamos->carne = $carne;
        $prestamos->nombre = $request->get('nombre');
        $prestamos->apellido = $request->get('apellido');
        $prestamos->facultad = $request->get('facultad');
        $prestamos->carrera = $request->get('carrera');
        $prestamos->genero = $request->get('genero');
        $prestamos->save();
    
        $prestamospc = Prestamo::all();
        return view('home')->with(['prestamospc' => $prestamospc]);
    }
    

    //esta guarda el prestamo 
   /*  public function store(Request $request)
    {
        $prestamos = new Prestamo();
        $prestamos->carne = $request->get('carne');
        $prestamos->nombre = $request->get('nombre');
        $prestamos->facultad = $request->get('facultad');
        $prestamos->carrera = $request->get('carrera');
        $prestamos->genero = $request->get('genero');
        $prestamos->pc = $request->get('compu');
        $prestamos->save();
        return view('prestamocompu.index')->with(['prestamospc'=>$prestamospc, 'usuarios'=>$usuarios]);
    } */

    // esta funcion es para el modal que busca por carnet para prestar
    public function show(Request $request)
    {
        $busca = $request->get('carne');
        $usuario = Usuario::where('carne', $busca)->first();
        if($usuario==false)
        {
            return view('prestamocompu.agregarusuario')->with(['busca'=>$busca]);
            
        }else{
            $compus  = Compu::All();
            return view('prestamocompu.prestar')->with(['usuario'=>$usuario, 'compus'=>$compus]);
        }
    }
    // esta funcion es para el modal que busca por nit para prestar
    public function showspace(Request $request)
    {
        $busca = $request->get('Nit'); 
        $usuario = UsuarioExterno::where('Nit', $busca)->first(); 
    
        if (!$usuario) {
            return view('usuario.agregarusuarioext')->with(['busca' => $busca]);
        }
    
        $compus  = Compu::All();
        return view('prestamocompu.prestarext', ['usuario' => $usuario, 'compus'=>$compus]);
    
    }

    //esta funcion es para el model para buscar por carnet y editar el usuario.
    public function showedit(Request $request)
    {
        $busca = $request->get('carne');
        $usuario = Usuario::where('carne', $busca)->first();
        
        if (!$usuario) {
            return view('prestamocompu.agregarusuario')->with(['busca' => $busca]);
        }
        
        return view('usuario.edituser')->with(['usuario' => $usuario]);
    }
    
    //esta es la funcion de liberar maquina en sala virtual.
    public function liberar($id, $comp)
    {
       
        $prestamo = Prestamo::find($id);
        $prestamo->nota = 1;
        $prestamo->save();

        $estadistica = new Estadistica();
        $estadistica->carne = $prestamo->carne;
        $estadistica->nombre = $prestamo->nombre;
        $estadistica->facultad = $prestamo->facultad;
        $estadistica->carrera = $prestamo->carrera;
        $estadistica->genero = $prestamo->genero;
        $estadistica->pc = $prestamo->pc;
        $estadistica->save();

        $compu = Compu::find($comp);
        $compu->estado = 0;
        $compu->save();
        
        $prestamo->delete();
        return redirect('/prestamocompus');

    }
    public function liberarpcspace($id, $comp)
    {
        $prestamoSpace = PrestamosPcSpace::find($id);
        $prestamoSpace->delete();

        $estadistica = new Estadistica();
        $estadistica->carne = $prestamoSpace->nit;
        $estadistica->nombre = $prestamoSpace->nombre;
        $estadistica->facultad = 'Usuario Externo';
        $estadistica->genero = $prestamoSpace->genero;
        $estadistica->carrera = $prestamoSpace->institucion;
        $estadistica->pc = $prestamoSpace->pc;
        $estadistica->save();

        $compu = Compu::find($comp);
        $compu->estado = 0;
        $compu->save();

        return redirect('/prestamocompus');
    }

    
    //esta es la funcion de actualizar usuario 
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
    
        if (!$usuario) {
            return redirect()->route('prestamocompu.agregarusuario')
                ->with('error', 'Usuario no encontrado');
        }
    
        $carneActual = $usuario->carne;
        $carneNuevo = $request->input('carne');
    
        if ($carneNuevo != $carneActual) {
            $usuarioExistente = Usuario::where('carne', $carneNuevo)->first();
    
            if ($usuarioExistente) {
                return redirect()->back()->with('error', 'El carné ya está registrado.');
            }
        }
    
        $usuario->carne = $carneNuevo;
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->facultad = $request->input('facultad');
        $usuario->carrera = $request->input('carrera');
        $usuario->genero = $request->input('genero');

        $usuario->save();

        return redirect()->route('home', $id)
            ->with('success', 'Usuario actualizado correctamente');
    }
    
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Usuario;
use App\Models\Compu;
use App\Models\Estadistica;

class PrestamoController extends Controller
{

    public function index()
    {
        $prestamospc = Prestamo::all();
        $usuarios = Usuario::all();
        return view('prestamocompu.index')->with(['prestamospc'=>$prestamospc]);
    }

    //esta funcion de guardar el prestamo de la compue que se muestra en la tabla de vista sala virtual
    public function guardar(Request $request)
    {
        // Obtener el carnet del formulario
        $carnet = $request->get('carne');
    
        // Verificar si ya existe un préstamo con el mismo carnet
        $prestamoExistente = Prestamo::where('carne', $carnet)->first();
    
        if ($prestamoExistente) {
            // Si ya existe un préstamo con el mismo carnet, puedes manejar el error
            // o mostrar un mensaje de error y redirigir al usuario de vuelta al formulario.
            return redirect()->back()->with('error', 'Ya existe un préstamo con este carnet.');
        }
    
        // Si no existe un préstamo con el mismo carnet, procede a crear el nuevo préstamo.
        $prestamos = new Prestamo();
        $prestamos->carne = $carnet;
        $prestamos->nombre = $request->get('nombre');
        $prestamos->facultad = $request->get('facultad');
        $prestamos->carrera = $request->get('carrera');
        $prestamos->genero = $request->get('genero');
        $prestamos->pc = $request->get('compu');
        $prestamos->save();
    
        $compu = Compu::find($request->get('compu'));
        $compu->estado = 1;
        $compu->save();
    
        $prestamospc = Prestamo::all();
        $usuarios = Usuario::all();
        return redirect()->route('prestamocompu.index');
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

    //esta es la funcion de actualizar usuario 
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
    
        if (!$usuario) {
            return redirect()->route('prestamocompu.agregarusuario')
                ->with('error', 'Usuario no encontrado');
        }
    
        // Obtén el carné actual del usuario
        $carneActual = $usuario->carne;
    
        // Obtén el carné que se quiere asignar en la edición
        $carneNuevo = $request->input('carne');
    
        // Verifica si el carné nuevo es diferente al carné actual
        if ($carneNuevo != $carneActual) {
            // Verifica si ya existe un usuario con el mismo carné nuevo
            $usuarioExistente = Usuario::where('carne', $carneNuevo)->first();
    
            if ($usuarioExistente) {
                // El carné nuevo ya está en uso por otro usuario, muestra un mensaje de error
                return redirect()->back()->with('error', 'El carné ya está registrado.');
            }
        }
    
        // Si todo está bien, actualiza los campos del usuario con los valores del formulario
        $usuario->carne = $carneNuevo;
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->facultad = $request->input('facultad');
        $usuario->carrera = $request->input('carrera');
        $usuario->genero = $request->input('genero');
    
        // Guarda los cambios en la base de datos
        $usuario->save();
    
        // Redirige de vuelta a la vista home con un mensaje de éxito
        return redirect()->route('home', $id)
            ->with('success', 'Usuario actualizado correctamente');
    }
    
    public function destroy($id)
    {
        //
    }
}

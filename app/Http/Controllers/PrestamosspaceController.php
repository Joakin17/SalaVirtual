<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamosspace;
use App\Models\UsuarioExterno; 
use App\Models\Salaspace; 

class PrestamosspaceController extends Controller
{
    // Función para mostrar la lista de préstamos de espacio
    public function index()
    {
        $prestamospace = Prestamosspace::all();
        $usuarioExterno = UsuarioExterno::all();
        return view('prestamosamericanspace.index')->with(['prestamospace' => $prestamospace]);
    }
    

    public function guardarspace(Request $request)
    {
        $prestamo = new Prestamosspace();
        $prestamo->nit = $request->get('nit');
        $prestamo->nombre = $request->get('nombre');
        $prestamo->institucion = $request->get('institucion');
        $prestamo->genero = $request->get('genero');
        $prestamo->mesa = $request->get('mesa'); // Cambio 'salaspace' a 'mesa'
        $prestamo->tipo = $request->get('tipo');
        $prestamo->hora_entrada = now(); // Utilizar la función now() para obtener la fecha y hora actual

        $prestamo->save();

        $salaspace = Salaspace::find($request->get('mesa')); // Cambio 'salaspace' a 'mesa'
        if ($salaspace) {
            $salaspace->puesto = $request->get('puesto1');
            $salaspace->save();
        }
        
        $prestamosspace = Prestamosspace::all();
        $usuarioExterno = UsuarioExterno::all();

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
    
    
    
}

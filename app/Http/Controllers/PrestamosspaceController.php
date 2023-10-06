<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamosspace;
use App\Models\UsuarioExterno; 
use App\Models\Salaspace; 

class PrestamosspaceController extends Controller
{

    public function index()
    {
        $prestamosspace = Prestamosspace::all();
        $usuarioExterno = UsuarioExterno::all();
        return view('prestamosamericanspace.index', ['prestamosspace' => $prestamosspace]);
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
        }

        $prestamo->delete();

        return redirect('/prestamosspace');
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

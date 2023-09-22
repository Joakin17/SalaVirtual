<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamosala;
use App\Models\Usuario;
use App\Models\Salasestudio;
use App\Models\Estadisticasala;

class PrestamosalaController extends Controller
{
    
    public function index()
    {
        $prestamossala = Prestamosala::all();
        $usuarios = Usuario::all();
        return view('prestamosala.index')->with(['prestamossala'=>$prestamossala]);
    }

    public function create()
    {
        //
    }
 
    public function guardar(Request $request)
{
    $carnet = $request->get('carne');

    // Verificar si ya existe un préstamo con el mismo carnet en la misma sala
    $prestamoExistente = Prestamosala::where('carne', $carnet)
        ->where('sala', $request->get('sala'))
        ->first();

    if ($prestamoExistente) {
        // Si ya existe un préstamo con el mismo carnet en la misma sala,
        // puedes manejar el error o mostrar un mensaje de error y redirigir
        return redirect()->back()->with('error', 'Ya existe un préstamo en esta sala con este carnet.');
    }

    // Continuar con el proceso de guardar el préstamo si no hay un préstamo existente
    $prestamos = new Prestamosala();
    $prestamos->carne = $carnet;
    $prestamos->nombre = $request->get('nombre');
    $prestamos->facultad = $request->get('facultad');
    $prestamos->carrera = $request->get('carrera');
    $prestamos->genero = $request->get('genero');
    $prestamos->sala = $request->get('sala');
    
    if ($request->get('sala') == 3) {
        $prestamos->puesto = $request->get('puesto1');
        $puesto = $request->get('puesto1');
    } else {
        $prestamos->puesto = $request->get('puesto2');
        $puesto = $request->get('puesto2');
    }

    $prestamos->save();

    $salap = Salasestudio::where('sala', $request->get('sala'))
        ->where('puesto', $puesto)
        ->first();

    $salap->estado = 1;
    $salap->save();

    $prestamossala = Prestamosala::all();
    $usuarios = Usuario::all();

    return redirect()->route('prestamosala.index');
}


     
    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        $busca = $request->get('carne');
        $usuario = Usuario::where('carne', $busca)->first();;
        if($usuario==false)
        {
            return view('prestamocompu.agregarusuario')->with(['busca'=>$busca]);
            
        }else{
            $salas  = Salasestudio::All();
            return view('prestamosala.prestar')->with(['usuario'=>$usuario, 'salas'=>$salas]);
        }

       
    }

    public function edit($id)
    {
        //
    }
    public function liberarsala($id, $comp)
    {
       
        $prestamo = Prestamosala::find($id);
        //$prestamo->nota = 1;
        //$prestamo->save();

        $estadistica = new Estadisticasala();
        $estadistica->carne = $prestamo->carne;
        $estadistica->nombre = $prestamo->nombre;
        $estadistica->facultad = $prestamo->facultad;
        $estadistica->carrera = $prestamo->carrera;
        $estadistica->genero = $prestamo->genero;
        $estadistica->sala = $prestamo->sala;
        $estadistica->puesto = $prestamo->puesto;
        $estadistica->save();

        $salap = Salasestudio::where('sala', $prestamo->sala)->where('puesto', $prestamo->puesto)->first();
        $salap->estado = 0;
        $salap->save();


        $prestamo->delete();
        return redirect('/prestamosalas');
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamosala;
use App\Models\Usuario;
use App\Models\Salasestudio;
use App\Models\Estadisticasala;

class PrestamosalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamossala = Prestamosala::all();
        $usuarios = Usuario::all();
        return view('prestamosala.index')->with(['prestamossala'=>$prestamossala]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function guardar(Request $request)
    {
        $prestamos = new Prestamosala();
        $prestamos->carne = $request->get('carne');
        $prestamos->nombre = $request->get('nombre');
        $prestamos->facultad = $request->get('facultad');
        $prestamos->carrera = $request->get('carrera');
        $prestamos->genero = $request->get('genero');
        $prestamos->sala = $request->get('sala');
        if($request->get('sala') == 3)
        {
            $prestamos->puesto = $request->get('puesto1');
            $puesto = $request->get('puesto1');
        }else{
            $prestamos->puesto = $request->get('puesto2');
            $puesto = $request->get('puesto2');
        }
        //$prestamos->sala = $request->get('sala');     ::find($request->get('compu'));
        $prestamos->save();
        
        $salap = Salasestudio::where('sala', $request->get('sala'))->where('puesto', $puesto)->first();
        $salap->estado = 1;
        $salap->save();

        $prestamossala = Prestamosala::all();
        $usuarios = Usuario::all();
        return view('prestamosala.index')->with(['prestamossala'=>$prestamossala]);


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $busca = $request->get('carne');
        $usuario = Usuario::where('carne', $busca)->first();;
        $salas  = Salasestudio::All();
        return view('prestamosala.prestar')->with(['usuario'=>$usuario, 'salas'=>$salas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


       // return view('vendedor.edit')->with('vendedor', $vendedor);
    }

    public function liberar($id, $sala)
    {
       /*
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
*/

       // return view('vendedor.edit')->with('vendedor', $vendedor);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

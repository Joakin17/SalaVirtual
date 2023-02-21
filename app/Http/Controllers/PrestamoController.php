<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Usuario;
use App\Models\Compu;
use App\Models\Estadistica;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamospc = Prestamo::all();
        $usuarios = Usuario::all();
        return view('prestamocompu.index')->with(['prestamospc'=>$prestamospc]);
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
        $prestamos = new Prestamo();
        $prestamos->carne = $request->get('carne');
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
        return view('prestamocompu.index')->with(['prestamospc'=>$prestamospc]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $compus  = Compu::All();
        return view('prestamocompu.prestar')->with(['usuario'=>$usuario, 'compus'=>$compus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $comp)
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

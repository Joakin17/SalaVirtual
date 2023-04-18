<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estacompus = DB::select(DB::raw("SELECT e.facultad, 
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 1 AND facultad = e.facultad AND YEAR(created_at) = :y1) AS enero,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 2 AND facultad = e.facultad AND YEAR(created_at) = :y2) AS febrero,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 3 AND facultad = e.facultad AND YEAR(created_at) = :y3) AS marzo,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 4 AND facultad = e.facultad AND YEAR(created_at) = :y4) AS abril,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 5 AND facultad = e.facultad AND YEAR(created_at) = :y5) AS mayo,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 6 AND facultad = e.facultad AND YEAR(created_at) = :y6) AS junio,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 7 AND facultad = e.facultad AND YEAR(created_at) = :y7) AS julio,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 8 AND facultad = e.facultad AND YEAR(created_at) = :y8) AS agosto,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 9 AND facultad = e.facultad AND YEAR(created_at) = :y9) AS septiembre,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 10 AND facultad = e.facultad AND YEAR(created_at) = :y10) AS octubre,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 11 AND facultad = e.facultad AND YEAR(created_at) = :y11) AS noviembre,
        (SELECT IFNULL(COUNT(*),0) FROM estadisticasalas WHERE MONTH(created_at) = 12 AND facultad = e.facultad AND YEAR(created_at) = :y12) AS diciembre
        FROM estadisticasalas e GROUP BY facultad ORDER BY facultad"), array(
            'y1' => $request->year,
            'y2' => $request->year,
            'y3' => $request->year,
            'y4' => $request->year,
            'y5' => $request->year,
            'y6' => $request->year,
            'y7' => $request->year,
            'y8' => $request->year,
            'y9' => $request->year,
            'y10' => $request->year,
            'y11' => $request->year,
            'y12' => $request->year,
          ));
          $total = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
          );
          foreach ($estacompus as $reg) {
              $total[1] += $reg->enero;
              $total[2] += $reg->febrero;
              $total[3] += $reg->marzo;
              $total[4] += $reg->abril;
              $total[5] += $reg->mayo;
              $total[6] += $reg->junio;
              $total[7] += $reg->julio;
              $total[8] += $reg->agosto;
              $total[9] += $reg->septiembre;
              $total[10] += $reg->octubre;
              $total[11] += $reg->noviembre;
              $total[12] += $reg->diciembre;
          }
          return view('estadisticasalas.index')->with(['estacompus'=>$estacompus, 'y'=>$request->year, 'total'=>$total]);
    }

    public function mensual(Request $request)
    {
        $estacompus = DB::select(DB::raw("SELECT facultad, IFNULL((SELECT COUNT(*) FROM estadisticasalas WHERE facultad = e.facultad AND MONTH(created_at) = :m AND YEAR(created_at) = :y ),0) AS registros FROM estadisticasalas e GROUP BY facultad ORDER BY facultad"), array(
            'm' => $request->month,
            'y' => $request->year,
          ));

        $total = 0;
        foreach ($estacompus as $reg) {
            $total += $reg->registros;
        }
       return view('estadisticasalas.mensual')->with(['estacompus'=>$estacompus, 'm'=>$request->month, 'y'=>$request->year, 'total'=>$total]);
    }

    public function rango(Request $request)
    {
        $estacompus = DB::select(DB::raw("SELECT e.facultad, IFNULL((SELECT COUNT(*) FROM estadisticasalas WHERE created_at >= :inicio AND created_at <= DATE(DATE_ADD(:fin, INTERVAL 1 DAY)) AND facultad=e.facultad GROUP BY facultad ORDER BY facultad),0) AS registros FROM estadisticasalas e GROUP BY facultad ORDER BY facultad"), array(
            'inicio' => $request->inicio,
            'fin' => $request->fin,
          ));

        $total = 0;
        foreach ($estacompus as $reg) {
            $total += $reg->registros;
        }
       return view('estadisticasalas.rango')->with(['estacompus'=>$estacompus, 'inicio'=>$request->inicio, 'fin'=>$request->fin, 'total'=>$total]);
    }

    public function genero(Request $request)
    {
        $estacompus = DB::select(DB::raw("SELECT e.facultad, IFNULL((SELECT COUNT(genero) FROM estadisticasalas WHERE genero = 'F' AND facultad = e.facultad AND created_at >= :inicio1 AND created_at <= (DATE_ADD(:fin1, INTERVAL 1 DAY))),0) AS mujer, IFNULL((SELECT COUNT(genero) FROM estadisticasalas WHERE genero = 'M' AND facultad = e.facultad AND created_at >= :inicio2 AND created_at <= (DATE_ADD(:fin2, INTERVAL 1 DAY))),0) AS hombre FROM estadisticasalas e GROUP BY facultad ORDER BY facultad"), array(
            'inicio1' => $request->inicio,
            'fin1' => $request->fin,
            'inicio2' => $request->inicio,
            'fin2' => $request->fin,
          ));

        $totalMujer = 0;
        $totalHombre = 0;
        foreach ($estacompus as $reg) {
            $totalMujer += $reg->mujer;
            $totalHombre += $reg->hombre;
        }
       return view('estadisticasalas.genero')->with(['estacompus'=>$estacompus, 'inicio'=>$request->inicio, 'fin'=>$request->fin, 'totalMujer'=>$totalMujer, 'totalHombre'=>$totalHombre]);
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
    public function show($id)
    {
        //
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

<?php

namespace App\Http\Controllers;

use App\Cola;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Session;
use Illuminate\Support\Facades\DB;
use DateTime;
class ColaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cola = new Cola();
        $cola->cliente_id =  $request['id'];
        $cola->nombre = $request['nombre'];
        $cola->tipo_cola = 1;
        $cola1 = Cola::where('tipo_cola', 1)->get()->count()*2;
        $cola2 = Cola::where('tipo_cola', 2)->get()->count()*3;
        $cola->tipo_cola = ($cola1 <= $cola2) ? 1 : 2;
        $cola->fill($request->all())->save();
        $cola1 = Cola::where('tipo_cola', 1)->get();
        $cola2 = Cola::where('tipo_cola', 2)->get();
        return response()->json(array('cola1' => $cola1, 'cola2' => $cola2), 200);
    }
    public function getData()
    {
        $cola1 = Cola::where('tipo_cola', 1)->get();
        $cola2 = Cola::where('tipo_cola', 2)->get();
        $fecha1 = new DateTime();
        foreach($cola1 as $q){
            $fecha2 = new DateTime($q->created_at);
            $intervalo = $fecha1->diff($fecha2);
            if($intervalo->format('%i') > 2){
               $eliminar = Cola::where('id', $q->id)->first();
               $eliminar->delete();
            }
        }
        foreach($cola2 as $q2){
            $fecha2 = new DateTime($q2->created_at);
            $intervalo = $fecha1->diff($fecha2);
            if($intervalo->format('%i') > 3){
            $eliminar = Cola::where('id', $q2->id)->first();
               $eliminar->delete();
            }
        }
        $cola1 = Cola::where('tipo_cola', 1)->get();
        $cola2 = Cola::where('tipo_cola', 2)->get();
        return response()->json(array('cola1' => $cola1, 'cola2' => $cola2), 200);
    }
    public function deleteOne()
    {
        $eliminar = Cola::where('tipo_cola', 1)->first();
        if($eliminar != null){
            $eliminar->delete();
        }
        $cola1 = Cola::where('tipo_cola', 1)->get();
        return response()->json(array('cola1' => $cola1), 200);
    }

    public function deleteTwo()
    {
        $eliminar = Cola::where('tipo_cola', 2)->first();
        if($eliminar != null){
            $eliminar->delete();
        }
        $cola2 = Cola::where('tipo_cola', 2)->get();
        return response()->json(array('cola2' => $cola2), 200);
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
     * @param  \App\Cola  $cola
     * @return \Illuminate\Http\Response
     */
    public function show(Cola $cola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cola  $cola
     * @return \Illuminate\Http\Response
     */
    public function edit(Cola $cola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cola  $cola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cola $cola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cola  $cola
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cola $cola)
    {
        //
    }
}

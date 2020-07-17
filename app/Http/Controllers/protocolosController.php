<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Protocolo;
use App\Codigo;
use App\Sintoma;
use App\Detalle_Sintoma_Protocolo;

class protocolosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $protocolo = Protocolo::find(9);
        // $var =  $protocolo->det_sintomas_protocolos()->get();
        // foreach($var as $v){
        //     echo $v->id_sintoma;
        // }


        $protocolos = Protocolo::all();
        $det_sintomas_protocolos = Detalle_Sintoma_Protocolo::all();
        // foreach($protocolos as $protocolo){
        //     foreach($protocolo->det_sintomas_protocolos()->where('id_protocolo', 9)->get() as $det){
        //         echo $det;
        //     }
        // }
        return view('protocolos.index',compact('protocolos', 'det_sintomas_protocolos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codigos = Codigo::all();
        $sintomas = Sintoma::all();
        return view('protocolos.create', compact('codigos', 'sintomas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $protocolo = new Protocolo;
        $protocolo->id_codigo_triage= $request->codigo;
        $protocolo->descripcion= $request->desc;
        $protocolo->save();

        $sintomas = $_POST['cbs'];
        foreach($sintomas as $sintoma){
            $dsp = new Detalle_Sintoma_Protocolo;
            $dsp->id_protocolo = $protocolo->id;
            $dsp->id_sintoma = $sintoma;
            $dsp->save();
        }
        $request->session()->flash('alert-success', 'El protocolo fue agregado exitosamente!');
        return redirect()->route('protocolos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sintomas_protocolo = Detalle_Sintoma_Protocolo::where('id_protocolo', $id)
            ->leftJoin('Sintomas', 'Sintomas.id', '=', 'id_sintoma')->get();
        $protocolo = Protocolo::find($id);

        return view('protocolos.show', compact('sintomas_protocolo', 'protocolo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sintomas_protocolo = Detalle_Sintoma_Protocolo::where('id_protocolo', $id)
            ->leftJoin('Sintomas', 'Sintomas.id', '=', 'id_sintoma')->get();
        $protocolo = Protocolo::find($id);
        return view('protocolos.edit', compact('sintomas_protocolo', 'protocolo'));
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
        Detalle_Sintoma_Protocolo::where('id_protocolo', $id)->delete();
        Protocolo::destroy($id);
        return redirect()->route('protocolos.index');
    }
}

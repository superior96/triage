<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacientesController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $pacientes=Paciente::where('dni',$request->get('dni'))->get();
        if($pacientes->count()){
            $rta="el dni del paciente ingresado ya está cargado.";
        }else{
            $nuevo = new Paciente;
            $nuevo->dni=$request->get('dni');
            $nuevo->nombre=$request->get('nombre');
            $nuevo->apellido=$request->get('apellido');
            $nuevo->domicilio=$request->get('direccion');
            $nuevo->telefono=$request->get('telefono');
            $nuevo->fechaNac=$request->get('fechaNac');
            $nuevo->sexo=$request->get('sexo');
            $nuevo->save();
        }
        return redirect()->action('PacientesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    // public function shows(Request $request){
    //     $documento=$request->get('doc');
    //     $pacientes = Paciente::where('dni',$documento)->get();
    //     return view('pacientes.shows',compact('pacientes','documento'));
    // }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profesional;

class profesionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();
        return view('profesionales.index', compact('usuario')); #view('profesionales.index', compact ('profesional'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesionales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Profesional::where('matricula', $request->matricula)->get()->isEmpty()){
            if(Profesional::where('id_user', Auth::user()->id)->get()->isEmpty()){
                $profesional = new Profesional;
                $profesional->nombre = $request->nombre;
                $profesional->apellido = $request->apellido;
                $profesional->matricula = $request->matricula;
                $profesional->domicilio = $request->domicilio;
                $profesional->id_user = Auth::user()->id;
                $profesional->disponibilidad = 1;
                $profesional->save();
                $request->session()->flash('alert-success', 'Los datos se han agregado correctamente!');
            }else{
                $request->session()->flash('alert-danger', 'Ya posee un perfil!');
            }
        }else{
            $request->session()->flash('alert-danger', 'La matrícula ingresada ya se encuentra registrada!');
        }
        return redirect()->back();
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

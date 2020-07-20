<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Rol;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Illuminate\Foundation\Auth\RegistersUsers;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact ('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->register($request);
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
    public function destroy(Request $request, $id)
    {
        $aux = User::find($id)->username;
        if(Auth::user()->esAdmin()){ # El usuario logueado es Administrador?
            if(! User::find($id)->esAdmin()){ # El usuario que se quiere eliminar es administrador?
                if(User::destroy($id)){
                    $request->session()->flash('alert-success', 'El usuario '.$aux.' fue eliminado exitosamente!');
                }else{
                    $request->session()->flash('alert-danger', 'Hubo un problema para eliminar al usuario '.$aux);
                }
            }else{
                if(Auth::id()==1){ # El usuario logueado es Super Administrador?
                    if(User::destroy($id)){
                        $request->session()->flash('alert-success', 'El usuario '.$aux.' fue eliminado exitosamente!');
                    }else{
                        $request->session()->flash('alert-danger', 'Hubo un problema para eliminar al usuario '.$aux);
                    }
                }else{
                    $request->session()->flash('alert-warning', 'Solo el usuario '.User::find(1)->username.' puede eliminar a los usuarios Administradores!');
                }
            }
        }else{ # Si no es administrador entonces no puede eliminar usuarios
            $request->session()->flash('alert-warning', 'Debes ser administrador para eliminar otros usuarios!');
        }
        return redirect()->back();
    }

    ###################################################################################################


    // public function showRegistrationForm()
    // {
    //     $roles = Rol::all();
    //     return view('auth.register', compact('roles'));
    // }
    public function register(Request $request)
    {
        echo "entro register";
        if (Auth::user()->esAdmin()){
            $this->validator($request->all())->validate();
            event(new Registered($user = $this->create2($request->all())));
            // $this->guard()->login($user);
            if ($response = $this->registered($request, $user)) {
                return $response;
            }
            $request->session()->flash('alert-success', 'El usuario se ha creado exitosamente!');
            return $request->wantsJson()
                        ? new Response('', 201)
                        : redirect()->back()->withInput();
        }else{
            $request->session()->flash('alert-warning', 'Necesitas ser Administrador para realizar la registración de un nuevo usuario!');
            return redirect()->back()->withInput();
        }
    }

    protected function registered(Request $request, $user)
    {
        // if(User::find($user->id)){
        //     echo "Está registrado";
        //     return "";
        // }else{
        //     echo "No estaba registrado";
        //     return "";
        // }
    }
    // public function redirectPath()
    // {
    //     if (method_exists($this, 'redirectTo')) {
    //         return $this->redirectTo();
    //     }

    //     return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    // }
    protected function guard()
    {
        return Auth::guard();
    }

    // use RegistersUsers;

    // /**
    //  * Where to redirect users after registration.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = RouteServiceProvider::HOME;

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_rol' => ['required', 'exists:roles,id'],
        ]);
    }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    protected function create2(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'id_rol' => $data['id_rol'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

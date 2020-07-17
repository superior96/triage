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
        if(Auth::user()->esAdmin()){
            if(! User::find($id)->esAdmin()){
                if(User::destroy($id)){
                    $msj="El usuario se ha eliminado"; #No hace nada por ahora
                }else{
                    $msj="Tal vez alguien ya eliminó al usuario"; #No hace nada por ahora
                }
            }else{
                $request->session()->flash('alert-warning', 'Solo el usuario '.User::find(1)->username.' puede eliminar a los usuarios Administradores!');                
            }
        }
        $request->session()->flash('alert-warning', 'Necesitas ser Administrador para poder eliminar al usuario!');
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
                        : redirect()->back();
        }else{
            $request->session()->flash('alert-warning', 'Necesitas ser Administrador para realizar la registración de un nuevo usuario!');
            return redirect()->back();
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
        echo "antes de validator";
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_rol' => ['required', 'exists:roles,id'],
        ]);
        echo "paso validator";
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

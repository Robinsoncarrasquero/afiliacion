<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $buscarWordKey = $request->get('buscarWordKey');
       $users = User::name($buscarWordKey)->orderBy('name','ASC')->paginate(50);

        return \view('user.index',compact('users'));
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

        $user=Auth::user();

        if ($id==Auth::id() || $user->role>0){

            $user = User::findOrFail($id);
            return \view('user.edit',\compact('user'));
        }
        \abort(404);
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
        $user = User::find($id);

        request()->validate(
            [
                'name' => 'required',
                'apellido' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'fechan' => 'required',
                'direccion' => 'required',
                'phone_number' => 'required',
            ],
            [
                'name.required'=>'El nombre es requerido.',
                'apellido.required'=>'El apellido es requerido.',
                'email.required' => "Email del usuario esta registrado con otra persona",
                'fechan.required' => "Fecha Nacimiento obligatoria",
                'email.unique' => "Este email ya ha sido tomado por otro usuario.",
                'direccion.required' => "Direccion es Requerida.",
                'phone_number.required' => "Telefono es requerido",
            ]);


        $user =User::findOrFail($id);
        {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->apellido = $request['apellido'];
            $user->direccion = $request['direccion'];
            $user->sexo = $request['sexo'];
            $user->fechan=$request['fechan'];
            $user->phone_number = $request['phone_number'];
            $user->cedula = $request['cedula'];
            $user->lugarnac = $request['lugarnac'];
            $user->nombrerep = $request['nombrerep'];
        }
        $user->save();

        if (Auth::user()->role==0){
            return redirect()->route('home')->withSuccess('Datos de afiliado modificado con exito');
        }
        return redirect()->route('user.index')->withSuccess('Datos de afiliado modificado con exito');

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

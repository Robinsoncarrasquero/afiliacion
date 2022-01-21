@extends('layouts.app')

@section('title',"Editar Usuario")

@section('content')

<div class="container" >


    <div id="flash-message">
        @include('flash-message')
    </div>

    <div class="mt-2 pb-2 text text-center ">
        <h5>Ficha de Afiliado</h5>
    </div>

    <div class="row">
        <div class="float-right">
            <form class="card-header" action="{{route('user.update',$user)  }}" method="post">
                @csrf
                @method('PATCH' )
                <div class="justify-content-start">
                    <div class="col-6">
                        <label for="name">Nombre</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{$user->name }}">
                    </div>
                </div>

                <div class="justify-content-start">
                    <div class="col-6">
                        <label for="apellido">Apellido</label>
                        <input id="apellido" class="form-control" type="text" name="apellido" value="{{$user->apellido}}">
                    </div>
                </div>


                <div class="justify-content-start">
                    <div class="col-6">
                        <label for="cedula">Cedula</label>
                        <input id="cedula" class="form-control"  name="cedula"  value="{{$user->cedula}}">
                    </div>
                </div>

                <div class="justify-content-start">
                    <div class="col-sm-6">
                        <label for="fechan">Fecha Nacimiento</label>
                        <input type="date"  id="fechan" class="form-control"  name="fechan" value="{{$user->fechan}}">
                    </div>
                </div>

                <div class="justify-content-start">
                    <div class="col-6">
                        <label for="lugarnac">Lugar de Nacimiento</label>
                        <input id="lugarnac" class="form-control"  name="lugarnac"  value="{{$user->lugarnac}}">
                    </div>
                </div>

                <div class="justify-content-start">
                    <div class="col-6">
                        <label >Sexo</label>
                        <select class="form-control" id="categoria" name="sexo">
                            <option  value="0">Femenino</option>
                            <option  value="0">Masculino</option>
                        </select>
                    </div>
                </div>

                <div class="justify-content-start">
                    <div class="col-6">
                        <label for="nombrerep">Nombre Representante</label>
                        <input id="nombrerep" class="form-control"  name="nombrerep"  value="{{$user->nombrerep}}">
                    </div>
                </div>

                <div class="justify-content-start">
                    <div class="col-6">
                        <label for="email">Email</label>
                        <input id="email" class="form-control"  name="email"  value="{{$user->email}}">
                    </div>
                </div>


                <div class="justify-content-start">
                    <div class="col-6">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control"  id="direccion" name="direccion" value="{{$user->direccion}}">
                    </div>
                </div>

                <div class="justify-content-start">
                    <div class="col-6">
                        <label for="phone_number">Telefono</label>
                        <input id="phone_number" class="form-control"  name="phone_number"  value="{{ $user->phone_number }}">
                    </div>
                </div>

                <div class="justify-content-start">
                    <div class="col-6">
                        <label class="form-check-label " for="active" style="color: rgb(255, 165, 0);font-size:1.em">Activo</label>
                        <input type="checkbox" class="check-select "  name="active" @if($user->active) checked @endif>
                    </div>
                </div>

                <div class="clearfix col-12 mt-2">
                    <div class="col-sm-6">
                        <a href="{{url()->previous()}}" class="btn btn-dark float-left">Regresar</a>
                        <button type="submit" class="btn btn-dark float-right">Guardar</button>
                    </div>
                </div>

            </form>

        </div>

    </div>



</div>






@endsection



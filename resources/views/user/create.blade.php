@extends('master')

@section('title',"Crear Usuario")

@section('content')

<div class="container">

    <div id="flash-message">
            @include('flash-message')
    </div>
    <div class="col-sm-8 text text-center">
        <h5 >Editar Usuario</h5>
    </div>

    <form class="card-header" action="{{route('user.store')  }}" method="post">
        @csrf
        <div class="justify-content-start">
            <div class="col-6">
                <label for="name">Nombre</label>
                <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="justify-content-start">
            <div class="col-6">
                <label for="apellido">Apellido</label>
                <input id="apellido" class="form-control" type="text" name="apellido" value="{{old('apellido')}}">
            </div>
        </div>

        <div class="justify-content-start">
            <div class="col-6">
                <label for="email">Email</label>
                <input id="email" class="form-control"  name="email"  value="{{ old('email')}}">
            </div>
        </div>

        <div class="justify-content-start">
            <div class="col-sm-6">
                <label for="fechan">Fecha Nacimiento</label>
                <input  type="date" id="fechan" class="form-control"  name="fechan" value="{{ old('fechan')}}">
            </div>
        </div>


        <div class="justify-content-start">
            <div class="col-6">
                <label >Sexo</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option  value="0">Femenino</option>
                    <option  value="0">Masculino</option>
                </select>
            </div>
        </div>

        <div class="justify-content-start">
            <div class="col-6">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control"  id="direccion" name="direcccion" value="{{old('direccion')}}">
            </div>
        </div>

        <div class="justify-content-start">
            <div class="col-sm-6">
                <label for="phone_number">Movil</label>
                <input id="phone_number" class="form-control"  name="phone_number"  value="{{ old('phone_number') }}">
            </div>
        </div>

        <div class="clearfix">
            <div class="col-6">
                <a href="{{route('user.index')}}" class="btn btn-dark float-left">Back</a>
                <button type="submit" class="btn btn-dark float-right">Save</button>

            </div>
        </div>

    </form>

</div>

@endsection

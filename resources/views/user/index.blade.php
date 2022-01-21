@extends('layouts.app')

@section('title',"Lista de Afiliados")

@section('content')


<div class="container">


    <div class="panel panel pb-3">
        <div class="clearfix">
            <form class="form-inline mt-2 mt-md-0 float-left">
                <input class="form-control mr-sm-2" type="text" placeholder="Nombre" aria-label="Search" name="buscarWordKey">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>

    <div class="text text-center">
        <h5>Lista de Afiliados</h5>
    </div>

    {{-- <div class="d-flex justify-content-end">
        <a  href="{{ route('user.create')}}" class="btn btn-dark"><i class="material-icons">library_add</library-add></i> </a>
    </div> --}}

    <div class="table table-responsive">
        <table class="table table-light table-striped">
            <thead>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha</th>
                <th>Telefono</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr id="{{ $user->id }}">
                <td>{{ $user->cedula}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->fechan}}</td>
                <td>{{ $user->phone_number}}</td>
                <td><a href="{{ route('user.edit',$user->id) }}" class="btn btn-success"><i class="material-icons">create</i></a></td>
                <td>
                    <button class="btn btn-danger" onclick="deleteConfirmation({{$user->id}},'{{route('user.delete',$user->id)}}')">Delete</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>

</div>

@section('scripts')
    <script src="{{ asset('js/deleteConfirmation.js') }}"></script>
@endsection

@endsection

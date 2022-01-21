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
                    @if($user->role<>1)
                    <button  name='btndelete' class="btn btn-danger" onclick="deleteConfirmation({{$user->id}},'{{route('user.delete',$user->id)}}')">Delete</button>
                    @else
                    <button disabled name='btndelete' class="btn btn-danger" onclick="deleteConfirmation({{$user->id}},'{{route('user.delete',$user->id)}}')">Delete</button>
                    @endif
                </td>
                {{-- <td>
                    <form class="d-inline formulario-eliminar" onsubmit="deleteConfirmation(id,{{route('user.delete',$user)}})">
                        @method("DELETE")
                        @csrf
                    <button type="submit" class="btn btn-danger">Borrar/button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>

</div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $(".formulario-eliminar").submit(function(e){

        //     e.preventDefault();
        //     alert('no  hixo');

        // });
        function deleteConfirmation(id,route){

            //console.log(e.target.value);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: route,
                        type: 'POST',
                        dataType: "json",
                        data: {
                        id:id
                        },
                        success: function(results) {
                            if (results.success) {
                                document.getElementById(id).remove();
                                Swal.fire(
                                'Up !',
                                'El registro ha sido eliminado con exito.',
                                'success'
                                )
                            } else {
                                Swal.fire(
                                'Error',
                                'El registro no fue eliminado.',
                                'warning'
                                )
                            }

                            console.log(data);

                        }

                    });


                }
            })

        }

    </script>
    {{-- <script>
        function deleteConfirmation2(id,route) {
            Swal.fire({
                title: "Borrar?",
                text: "Por favor asegurate y entonces confirma!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar esto!",
                cancelButtonText: "No, cancelar!",
                }).then(function (e) {
                    if ((e.isConfirmed) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            type: 'POST',
                            data: {_token: CSRF_TOKEN},
                            url:route,
                            dataType: 'JSON',
                            success: function (results) {
                                if (results.success === true) {
                                    document.getElementById(id).remove();
                                    swal("Done!", results.message + id, "success");
                                } else {
                                    swal("Error!", results.message, "error");
                                }
                            }
                        });
                    } else {
                        e.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })
            }
    </script> --}}

@endsection



@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">MIS TAREAS</div>

                <div class="card-body">
                    <a href="{{ route('tareas.create')}}" class="btn btn-dark mb-3">Crear tarea</a>

                	<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Fecha de entrega</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($tasks as $task)
                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->deadline }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    @if($task->is_complete == false)
                                        <span class="badge badge-warning">Pendiente</span>
                                    @else
                                        <span class="badge badge-success">Completada</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tareas.edit', $task->id)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                    <a href="" class="btn btn-outline-danger btn-sm">Eliminar</a>
                                    @if($task->is_complete == false)
                                        <a href="{{ route('tareas.status', $task->id)}}" class="btn btn-outline-success btn-sm">Completar</a>
                                    @endif

                                    
                                </td>
                                
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

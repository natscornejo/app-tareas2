@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">MIS TAREAS</div>

                <div class="card-body">
                    <a href="{{ route('tareas.create')}}" class="btn btn-dark mb-3">Crear tarea</a>

                	<table class="table table-sm">
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

                                    <form method="POST" style="display: inline-block;" action="{{ route ('tareas.destroy', $task->id) }}">
                                        {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            
                                                <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <ion-icon name="trash-bin-outline"></ion-icon>
                                                </button>
                                    </form>

                                    <a href="{{ route('tareas.edit', $task->id)}}" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>

                                    @if($task->is_complete == false)
                                        <a href="{{ route('tareas.status', $task->id)}}" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Completar"><ion-icon name="checkmark-outline"></ion-icon></ion-icon></a>
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

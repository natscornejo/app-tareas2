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

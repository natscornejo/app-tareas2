<div class="card-deck">
	
	<div class="card">

	@if ($project->status == 'En proceso')
		<div class="text-white px-2 text-center bg-primary" >{{ $project->status }}</div>
	@endif

	@if ($project->status == 'Terminado')
		<div class="text-white px-2 text-center bg-success">{{ $project->status }}</div>
	@endif

	@if ($project->status == 'Atrasado')
		<div class="text-white px-2 text-center bg-warning">{{ $project->status }}</div>
	@endif

	@if ($project->status == 'Cancelado')
		<div class="text-white px-2 text-center bg-danger">{{ $project->status }}</div>
	@endif

		<div class="card-header media border p-3">

			<div class="mr-3 mt-3 rounded-circle photoItemP">

				<img src="{{ asset('img/'. Auth::user()->name . '.jpg') }}" alt="{{ Auth::user()->name }}">
			</div>

			<div class="media-body">
				@foreach($project->tasks as $task)
					<h6 class="mb-0">Project by {{ $task->user->name }}</h6>
				@endforeach
				
				<p><small><i>Created at {{ Carbon\Carbon::parse($project->updated_at)->format('d M Y H:i') }}</i></small></p>
				<!-- <p><small><i>Started {{ Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</i></small></p> -->
			</div>
		</div>

		<div class="card-body">
			<div class="card-title">
				<h5>Project: {{ $project->name }}</h5>
				<p class="card-text">Description: {{ $project->description }}</p>
			</div>
		</div>
	
		<div class="card-body">
			
			<div class="card-title">
				<h5>Task list 
					<a href="" style="display: inline-block; float: right;" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#crearTarea_{{ $project->id }}">
						<ion-icon name="add-outline"></ion-icon>
					</a> 
				</h5> 
			</div>
			

			<div class="card-text">
				
				@foreach($project->tasks as $task)

	            <div class="d-flex align-items-center justify-content-between">
	            	<div style="width: 60%;">
	            		<p class="mb-lg-0">{{ $task->title }}</p>

	            		@if($task->is_complete == false)
	            			<span class="badge badge-warning">Pendiente</span>
	        			@else
	            			<span class="badge badge-success">Completada</span>
	        			@endif
	            	</div>
	            	
	            	<div>
	                    @if($task->is_complete == false)
	            		<a href="{{ route('tareas.status', $task->id)}}" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Completar">
	            			<ion-icon name="checkmark-outline"></ion-icon>
	            		</a>
	                    @endif

	                    <a href="{{ route('tareas.edit', $task->id)}}" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
	                        <ion-icon name="create-outline"></ion-icon>
	                    </a>

	                    <form method="POST" style="display: inline-block;" action="{{ route ('tareas.destroy', $task->id) }}">

	                        {{ csrf_field() }}
	                        {{ method_field('DELETE') }}

	                        <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
	                            <ion-icon name="trash-bin-outline"></ion-icon>
	                        </button>
	                    </form>
	            	</div>
				</div>
	        @endforeach
			</div>      
		</div>

		<div class="card-footer">
			<small class="text-muted">Last update {{ Carbon\Carbon::parse($project->created_at)->format('d M Y H:i') }}</small>
			<a href="" class="btn btn-dark" style="display:inline-block;">Go to the project</a>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="crearTarea_{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Nueva tarea</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
      	</div>

    	<form method="POST" action="{{ route('tareas.store') }}">

	      	<div class="modal-body">

	      	{{ csrf_field() }}

	      		<input type="hidden" name="source" value="proyectos" readonly>

	      		<input type="hidden" name="project_id" value="{{ $project->id }}" readonly>
	      		<input type="hidden" name="user_id" value="{{ $project->id }}" readonly="">

				<div class="form-group">
					<label for="">Titulo tarea</label>
					<input type="text" name="title" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Fecha entrega</label>
					<input type="date" name="deadline" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Descripcion</label>
					<textarea type="form-control" name="description" rows="5" class="form-control"></textarea>
				</div>


				<div class="form-group">
				    <label for="exampleFormControlSelect1">Selecciona usuario</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="user_id">
				    	@foreach($project->users as $user)
			    			<option value="{{ $user->id }}">{{ $user->name }}</option>
				        @endforeach
				    </select>
				</div>


	  		</div>

	  		<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-dark">Save changes</button>
        	</div>

      	</form>
    </div>
  </div>
</div>




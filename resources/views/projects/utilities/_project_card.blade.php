<div class="card mb-3">

	@if ($project->status == 'En proceso')
	<div class="text-white px-2 text-center bg-primary">{{ $project->status }}</div>
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

	<div class="card-body">
		
		<h5>{{ $project->name }}</h5>

		<p class="card-text">{{ $project->description }}</p>
		
		<hr>

		<a href="" class="btn btn-outline-dark btn-sm">Crear tarea</a>
		
		
		LISTADO DE TAREAS



                            @foreach($project->tasks as $task)

                            	<h6>{{ $task->title }}</h6>
                            	<p>{{ $task->deadline }}</p>

								
								{{-- @include('task.utilities._task_table.blade.php') --}}

                            	
                            @endforeach

		
		
		<hr>

		<p class="mb-0">Creado el: {{ Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</p>
		
		<p>Creado el: {{ Carbon\Carbon::parse($project->created_at)->format('d M Y H:i') }}</p>

		<hr>

		<a href="" class="btn btn-outline-dark btn-sm">Go to the project</a>

	</div>

</div>


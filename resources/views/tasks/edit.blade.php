@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">Editar tarea</div>

					<div class="card-body">
						<form method="POST" action="{{ route ('tareas.update', $task->id) }}">
							{{ csrf_field() }}
							{{ method_field('PUT') }}

							<div class="form-group">
								<label for="">Titulo tarea</label>
								<input type="text" name="title" class="form-control" value="{{ $task->title }}" required="">
							</div>

							<div class="form-group">
								<label for="">Fecha entrega</label>
								<input type="date" name="deadline" class="form-control" value="{{ $task->deadline }}">
							</div>

							<div class="form-group">
								<label for="">Descripcion</label>
								<textarea type="form-control" name="description" rows="5" class="form-control">{{ $task->description }}</textarea>
							</div>

							<button type="submit" class="btn btn-outline-primary">Actualizar tarea</button>

							<a href="{{ route ('tareas.index') }}" class="btn btn-outline-success">Cancelar</a>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
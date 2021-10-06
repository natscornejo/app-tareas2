@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">Crear tarea</div>

					<div class="card-body">
						<form method="POST" action="{{ route ('tareas.store') }}">
							{{ csrf_field() }}

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

							<button type="submit" class="btn btn-dark">Guardar tarea</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
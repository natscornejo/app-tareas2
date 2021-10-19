@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12 text-right">

                <div class="card-body">
                    <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#ProjectModal">NUEVO PROYECTO</a>
                </div>
        </div>
    </div>

    <div class="row">

    	<div class="col-md-12">
    		<div class="card-header">MIS PROYECTOS</div>
    	</div>

    	@foreach($projects as $project)

	    	<div class="col-md-4">
	    		<div class="card card-body">

	    			<h5>{{ $project->name }}</h5>
	    			<p class="card-text">{{ $project->description }}</p>
	    			<span class="badge badge-warning">{{ $project->status }}</span>
	    			
	    			<div class="card">
	    				<a href="{{ route('proyectos.show', $project->id)}}" class="btn btn-primary">Go to the project</a>
	    			</div>
	    		</div>
	    		
	    	</div>

    	@endforeach

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="ProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{ route('proyectos.store') }}">

      	{{ csrf_field() }}
	    
	      <div class="modal-body">
	        <div class="row">

	        	<div class="col-md-8">
	        		<div class="form-group">
	        			<label for="">Nombre</label>
	        			<input type="text" class="form-control" name="name" required="">
	        		</div>
	        	</div>

	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<label for="">Estado</label>
	        			<select name="status" class="form-control">

	        			    <option value="En proceso">En proceso</option>
	        			    <option value="Terminado">Terminado</option>
	        			    <option value="Atrasado">Atrasado</option>
	        			    <option value="Cancelado">Cancelado</option>

        			    </select>
	        		</div>
	        	</div>
	        </div>

	        <div class="form-group">
	        	<label for="">Description</label>
	        	<textarea class="form-control" name="description" id="" cols="3" rows="5"></textarea>
	        </div>

	      </div>

	      <div class="modal-footer">

	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>

      </form>
    </div>
  </div>
</div>

@endsection
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

	    		@include ('projects.utilities._project_card')
	    		
	    	</div>

    	@endforeach

    </div>

</div>


@include ('projects.utilities._create_modal')

@endsection
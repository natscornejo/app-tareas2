@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12 text-right">

                <div class="card-body">
                    <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#ProjectModal"><ion-icon name="add-outline"></ion-icon> NUEVO PROYECTO</a>
                </div>
        </div>
    </div>

    <div class="row">

    	<div class="col-md-12" style="margin-bottom: 20px;">
    		<div class="card-header" style="border-radius:60px;">MIS PROYECTOS</div>
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
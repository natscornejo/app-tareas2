@if (Session::has ('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

  <strong>Submitted</strong> {{ Session::get('success') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>

@endif


@if (Session::has ('info'))

<div class="alert alert-primary alert-dismissible fade show" role="alert">

  <strong>Editado</strong> {{ Session::get('info') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>

@endif


@if (Session::has ('status'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

  <strong>Completado </strong> {{ Session::get('status') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>

@endif

@if (Session::has ('delete'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

  <strong>Borrado</strong> {{ Session::get('delete') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>

@endif


@if (Session::has ('edit'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

  <strong>Editando</strong> {{ Session::get('edit') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>

@endif
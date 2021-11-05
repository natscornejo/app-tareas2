@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="media border p-3">
                    <div class="mr-3 mt-3 rounded-circle photoItem">
                        <img src="{{ asset('img/'. Auth::user()->name . '.jpg') }}" alt="{{ Auth::user()->name }}">
                    </div>
                    
                    <div class="media-body">
                        <h4>Hi {{ Auth::user()->name }} <small><i>Creado el: {{ Carbon\Carbon::parse(Auth::user()->created_at)->format('d M Y H:i') }}</i></small></h4>

                        <div>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            Welcome back! <ion-icon name="heart-circle-outline"></ion-icon>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><ion-icon name="sparkles-outline"></ion-icon> Music for today <ion-icon name="sparkles-outline"></ion-icon></h5>
                    <p class="card-text">
                        <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1EIV5Po98yTZ2l?utm_source=generator" width="100%" height="380" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                    </p>
                    <a href="https://open.spotify.com/playlist/37i9dQZF1EIV5Po98yTZ2l?si=5a7b1cab4b534823" class="btn btn-outline-dark">Playlist</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

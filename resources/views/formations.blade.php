@extends('layouts.app')

@section('content')

<section class="banner-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 banner-right">
                <h1 class="text-white">
                    Formations
                </h1>
                <p class="mx-auto text-white  mt-20 mb-40">
                    In the history of modern astronomy, there is probably no one greater leap forward than the building.
                </p>
                <div class="link-nav">
                    <span class="box">
                    <a href="{{ route('index') }}">Home </a>
                    <i class="lnr lnr-arrow-right"></i>
                    <a href="{{ route('formations') }}">Formations</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="popular-course-area section-gap">
    <div class="container-fluid">
        <div class="row justify-content-center section-title">
            <div class="col-lg-12">
                <h2>
                    Nos formations
                </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div><br>

        <!-- @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <p>Bon retour {{ Auth::user()->name}}</p>
            @else
            <a class="btn text-uppercase" href="{{ route('login')}}">Se connecter</a>
            @endauth
        </div>
        @endif <br> -->
        <div class="row">
        @foreach($formations as $formation)
            <div class="card mb-6">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{ $formation->image ? Storage::url($formation->image->path ): '#'}}" width="250px" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h3 class="card-title"><a href="{{ route('formations.show', $formation->id)}}">{{ $formation->name }}</a></h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum at nulla in voluptas aliquid, cumque rem, distinctio dolor consequatur sint deserunt laboriosam quasi esse enim non obcaecati.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
        </div
    </div>
</section>

@endsection


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
            Popular Courses <br />
            Available Right Now
          </h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <p>Bon retour {{ Auth::user()->name}}</p>
            @else
                <a href="{{ route('login')}}">Se connecter</a>
            @endauth
        </div>
        @endif
    <div class="owl-carousel popuar-course-carusel">
        @foreach($formations as $formation)
        <div class="single-popular-course">
            <div class="thumb">
                <img class="f-img img-fluid mx-auto" src="img/popular-course/p1.jpg" alt="" />
            </div>
            <div class="details">
                <div class="d-flex justify-content-between mb-20">
                    <p class="name">{{ $formation->name}}</p>
                    <p class="value">$150</p>
                </div>

                <a href="{{ route('formations.show', $formation->id)}}"><h4>{{ $formation->name}}</h4></a>

                <div class="bottom d-flex mt-15">
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                </div>
            </div>
        </div>
        @endforeach
    </div>

  </section>

@endsection

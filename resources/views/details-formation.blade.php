@extends('layouts.app')

@section('content')
<section class="banner-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 banner-right">
                    <h1 class="text-white">
                       Detail Formation
                    </h1>
                    <p class="mx-auto text-white  mt-20 mb-40">
                        In the history of modern astronomy, there is probably no one greater leap forward than the
                        building.
                    </p>
                    <div class="link-nav">
                        <span class="box">
                            <a href="{{ route('index') }}">Home </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="{{ route('formations') }}">Formation </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="#">{{ $formation->name }} </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container">
    <div class="content-wrapper offset-lg-2 col-lg-8">
        <h1 class="title">{{ $formation->name }}</h1><br><br>
        <div class="content">
            <h3  class="title">Objectifs</h4><br>
            <p class="text-justify">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure tempore totam dolore hic accusantium id assumenda tenetur atque, odio debitis dolorem ipsum asperiores quae quaerat dicta, perspiciatis culpa eligendi alias. Nam ab, quibusdam perspiciatis repudiandae delectus voluptatum accusamus enim maxime magnam excepturi dolorem sapiente illo fuga omnis perferendis? Architecto, doloremque. <br>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure tempore totam dolore hic accusantium id assumenda tenetur atque, odio debitis dolorem ipsum asperiores quae quaerat dicta, perspiciatis culpa eligendi alias. Nam ab, quibusdam perspiciatis repudiandae delectus voluptatum accusamus enim maxime magnam excepturi dolorem sapiente illo fuga omnis perferendis? Architecto, doloremque.

            </p><br>

            <h3 class="title">Prerequis</h4><br>
            <div class="card col-lg-4">
                <div class="card-body">
                    <ul>
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                    </ul>
                </div>
            </div><br>

            <h3 class="title">Tableau de Bord</h4>

            @foreach($formation->modules as $module)

                <br><h4 class="title"> Module : {{ $module->name }}</h5>
                @foreach($module->chapitres as $chapitre)
                    <ul>
                        <li> Chapitre : {{ $chapitre->name}}</li>
                    </ul>
                @endforeach

            @endforeach

            <div class="col-lg-12 text-center">
                <a class="btn text-uppercase" href="{{ route('formations.lecture', $formation->id)}}">Commencer</a>
            </div>
        </div>
    </div>

</div>
@endsection

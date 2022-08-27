@extends('layouts.app')

@section('content')
<section class="banner-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 banner-right">
                    <h1 class="text-white">
                    {{ $formation->name }}
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
        @foreach($formation->modules as $module)
            <br><h1 class="title"> Module : {{ $module->name }}</h1><br><br>
            @foreach($module->chapitres as $chapitre)
                <div class="content">
                    <br><h3 class="title"> Chapitre : {{ $chapitre->name }}</h4><br>
                    @foreach($chapitre->lecons as $lecon)
                        <br><h5> Lecon : {{ $lecon->name }}</h5>
                        <div class="row text-justify">
                            <br>{{ $lecon->content }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endforeach
    </div>
    <br><h6>Félicitation, avez vous terminez cette formation !!</h6>
</div>
@endsection

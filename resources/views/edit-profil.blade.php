@extends('layouts.app')

@section('content')

<section class="banner-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 banner-right">
                <h1 class="text-white">
                    Edit-Profil
                </h1>
                <p class="mx-auto text-white  mt-20 mb-40">
                    In the history of modern astronomy, there is probably no one greater leap forward than the building.
                </p>
                <div class="link-nav">
                    <span class="box">
                        <a href="{{ route('index') }}">Home </a>
                        <i class="lnr lnr-arrow-right"></i>
                        <a href="{{ route('editProfil') }}">Edit-Profil</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

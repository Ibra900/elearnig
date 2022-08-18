@extends('layouts.app')

@section('content')

<section class="banner-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 banner-right">
                <h1 class="text-white">
                    Profil
                </h1>
                <p class="mx-auto text-white  mt-20 mb-40">
                    In the history of modern astronomy, there is probably no one greater leap forward than the building.
                </p>
                <div class="link-nav">
                    <span class="box">
                        <a href="{{ route('index') }}">Home </a>
                        <i class="lnr lnr-arrow-right"></i>
                        <a href="{{ route('profil') }}">Profil</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="content-wrapper col-lg-12">

        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title"><b>A PROPOS</b></h5>
                        <p class="card-text"> Nom : {{ $user->name}}</p>
                        <p class="card-text"> Email : {{ $user->email}}</p>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title"><b>INFORMATION DU COMPTE</b></h5>
                        <p class="card-text">Date création : {{ $user->created_at->format('j F Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <a href="" class="btn btn-primary" style="background-color: #ac2bac;" role="button">Modifier</a>
        </div>
    </div>
</div>

<!-- shadow p-3 mb-5 -->

@endsection

@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('DETAIL LECON : ') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.lecons.index') }}">Liste Leçons</a></li>
                        <li class="breadcrumb-item active">Detail lecon </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="card-title">
                    {{ __('Titre : ') }} <b>{{ $data[0]->name}}</b>
                </h1><br>
                    <em>
                        {{ __('Chapitre : ') }}
                        <a href="{{ route('admin.chapitres.show', $data[0]->idchapitre) }}">{{ $data[0]->chapitre }}</a>
                    </em>
                <hr>
                <p class="card-text text-justify">
                    {{ $data[0]->content}}
                </p>
            </div>
        </div>
    </section>
</div>
@endsection

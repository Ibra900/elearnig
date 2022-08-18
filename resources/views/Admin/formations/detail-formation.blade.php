@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.formations.index') }}">Liste formation</a></li>
                        <li class="breadcrumb-item active">Detail formation </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">

        <div class="container">
            <div class="card mb-3">
                <img src="{{ Storage::url($formation->Image->path) }}" width="70px" heigth="50px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title"><b>{{ __('FORMATION : ')  }} {{ $formation->name }}</b></h1><br>
                    @foreach($formation->modules as $module)
                        <p class="card-text">{{ __('MODULE : ')  }} <b>{{ $module->name}}</b></p>
                        @foreach($module->chapitres as $chapitre)
                            <ul>
                                <li>{{ __('Chapitre : ')  }} <b>{{ $chapitre->name }}</b></li>
                                @foreach($chapitre->lecons as $lecon)
                                    <ul>
                                        <li>{{ $lecon->name }}</li>
                                    </ul>
                                @endforeach
                            </ul>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

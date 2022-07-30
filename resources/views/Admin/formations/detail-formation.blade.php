@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('DETAIL FORMATION : ') }}</h1>
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
        <h2 class="m-0"> Titre : {{ $formation->name }}</h2><hr>
        <div class="container">
            <div>
                @foreach($formation->modules as $module)
                    <div>
                        <h3>Module : {{ $module->name}}</h3>
                        <div>
                            @foreach($module->chapitres as $chapitre)
                                <div>
                                    <h4> Chapitre : {{ $chapitre->name}}</h4>
                                    <div>
                                        @foreach($chapitre->lecons as $lecon)
                                            <h5>Leçon {{ $lecon->name}}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

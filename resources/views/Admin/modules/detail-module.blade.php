@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('DETAIL MODULE : ') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.modules.index') }}">Liste module</a></li>
                        <li class="breadcrumb-item active">Detail module </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <h2 class="m-0"> Titre : {{ $module->name }}</h2><hr>
        <div class="container">
            <div>
                @foreach($module->chapitres as $chapitre)
                    <div>
                        <h4> Chapitre : {{ $chapitre->name}}</h4>
                            @foreach($chapitre->lecons as $lecon)
                                <div>
                                    <h5>Leçon {{ $lecon->name}}</h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

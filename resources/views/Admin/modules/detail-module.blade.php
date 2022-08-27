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
                        <li class="breadcrumb-item"><a href="{{ route('admin.modules.index') }}">Liste module</a></li>
                        <li class="breadcrumb-item active">Detail module </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="card-title">
                    {{ __('MODULE : ') }} <b>{{ $data[0]->module}}</b>
                </h1><br>
                    <em>
                        {{ __('Formation : ') }}
                        <a href="{{ route('admin.formations.show', $data[0]->idform) }}">
                            {{ $data[0]->formation }}
                        </a>
                    </em>
                <hr>

                @foreach($data as $rw)
                    <p class="card-text">{{ __('Chapitre  : ')  }} <b>{{ $rw->chapitre}}</b></p>
                        <ul>
                            <li>{{ __('Leçon: ')  }} <b>{{ $rw->lecon }}</b></li>
                        </ul>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

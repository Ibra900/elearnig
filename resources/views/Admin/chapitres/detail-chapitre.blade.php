@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('DETAIL CHAPITRE : ') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.chapitres.index') }}">Liste chapitres</a></li>
                        <li class="breadcrumb-item active">Detail chapitre </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="card-title">
                    {{ __('CHAPITRE : ') }} <b>{{ $data[0]->chapitre}}</b>
                </h1><br>
                    <em>
                        {{ __('Module : ') }}
                        <a href="{{ route('admin.modules.show', $data[0]->idmodule) }}">{{ $data[0]->module}}</a>
                    </em>
                <hr>
                @foreach($data as $row)
                    <ul>
                        <li class="card-text">{{ __('Leçon ') }} {{ ++$i }} {{ __(' : ')}}<b>{{ $row->lecon }}</b></li>
                    </ul>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

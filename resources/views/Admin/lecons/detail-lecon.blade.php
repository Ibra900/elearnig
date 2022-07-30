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
        <h2 class="m-0"> Titre : {{ $lecon->name }}</h2><hr>
        <div class="container">
            <div>
                <p>{{ $lecon->content }}</p>
            </div>
        </div>
    </section>
</div>
@endsection

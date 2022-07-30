@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Nouvelle Leçon') }} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Nouvelle Leçon </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.lecons.store') }} " method="POST">
                            @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label">{{ __('Choisir le chapitre') }}</label>
                                    <select class="form-control form-select" name="chapitre" autofocus>
                                        @foreach($chapitres as $chapitre)
                                            <option value="{{ $chapitre->id }}">{{ $chapitre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label">{{ __('Titre') }}</label>
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="content" class="col-md-4 col-form-label">Contenu</label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" ></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

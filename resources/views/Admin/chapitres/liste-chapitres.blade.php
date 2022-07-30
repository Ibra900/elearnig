@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Liste des chapitres : ') }} {{ $nbre }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Liste chapitre </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chapitres as $chapitre)
                                        <tr>
                                            <th scope="row">{{ $chapitre->id }}</th>
                                            <td>{{ $chapitre->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.chapitres.edit', $chapitre->id) }}" class="btn btn-primary">Editer</a>
                                                <a href="{{ route('admin.chapitres.show', $chapitre->id) }}" class="btn btn-primary">Detail</a>
                                                @can('delete')
                                                    <form action="{{ route('admin.chapitres.destroy', $chapitre->id) }}" class="d-inline"method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning">Supprimer</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

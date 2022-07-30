@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Liste des Modules : ') }} {{ $nbre }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Liste Module </li>
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
                                    @foreach($modules as $module)
                                        <tr>
                                            <th scope="row">{{ $module->id }}</th>
                                            <td>{{ $module->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.modules.edit', $module->id) }}" class="btn btn-primary">Editer</a>
                                                <a href="{{ route('admin.modules.show', $module->id) }}" class="btn btn-primary">Detail</a>
                                                @can('delete')
                                                    <form action="{{ route('admin.modules.destroy', $module->id) }}" class="d-inline"method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning">Supprimer</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <!-- { { route('admin.pages.edit', $formation->id) } } -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

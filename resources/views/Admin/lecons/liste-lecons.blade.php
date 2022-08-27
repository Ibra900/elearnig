@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="pull-left">
                        <h1>{{ __('Liste des leçons (') }} {{ $nbre }} {{ __(')')}}</h1>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Liste leçon </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="20%">N°</th>
                <th scope="col" width="40%">Titre</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lecons as $lecon)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>
                        {{ $lecon->name }} <br>
                        <em>
                            chapitre :
                            <a href="{{ route('admin.chapitres.show', $lecon->idchapitre) }}">{{ $lecon->chapitre}}</a>
                        </em>
                    </td>
                    <td>
                        <a href="{{ route('admin.lecons.show', $lecon->id) }}" class="btn" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('admin.lecons.edit', $lecon->id) }}" class="btn" title="edit">
                            <i class="fas fa-edit text-gray-300"></i>
                        </a>

                        @can('delete')
                            <form action="{{ route('admin.lecons.destroy', $lecon->id) }}" class="d-inline"method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $lecons->links() }}
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 margin-tb">
                <div class="col-sm-6 ">
                    <div class="pull-left">
                        <h1>{{ __('Liste des formations (') }} {{ $nbre }} {{ __(')')}}</h1>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Liste formation </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- <div class="row">
        <div class="pull-right">
            <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                data-attr="" title="Create a project"> <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div> -->

    <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col" width="30%">Titre</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formations as $formation)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $formation->name }}</td>
                    <td><img src="{{ Storage::url($formation->Image->path) }}" alt="" width="70px" heigth="50px"></td>
                    <td>
                        <a href="{{ route('admin.formations.show', $formation->id) }}" class="btn" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
                        <a href="{{ route('admin.formations.edit', $formation->id) }}" class="btn" title="edit">
                            <i class="fas fa-edit text-gray-300"></i>
                        </a>
                        @can('delete')
                            <form action="{{ route('admin.formations.destroy', $formation->id) }}" class="d-inline"method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" title="delete">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> <!-- { { route('admin.pages.edit', $formation->id) } } -->
</div>
@endsection

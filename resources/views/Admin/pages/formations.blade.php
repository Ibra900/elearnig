@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liste des formations') }}</div>

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
                    @foreach($formations as $formation)
                        <tr>
                            <th scope="row">{{ $formation->id }}</th>
                            <td>{{ $formation->name }}</td>
                            <td>
                                <a href="#" class="btn btn-primary">Editer</a>
                                @can('delete-user')
                                <form action="{{ route('admin.pages.destroy', $formation->id) }}" class="d-inline"method="post">
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

                    <!-- { { route('admin.pages.edit', $formation->id) } } -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

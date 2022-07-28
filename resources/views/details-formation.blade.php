@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">{{ $formation->name }}</h2>
                    <h4>Liste des Modules</h4>
                    @forelse($formation->modules as $module)
                        <h3> <a href="{{ route('module', $module->id)}}"> Module : {{ $module->name }}</a></h3>
                            @foreach($module->chapitres as $chapitre)
                                <h5>{{ $chapitre->name }}</h5>
                            @endforeach
                    @empty
                        <span>Aucun</span><br>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

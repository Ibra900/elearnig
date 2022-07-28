@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">{{ $module->name }}</h2>
                    @foreach($module->chapitres as $chapitre)
                        <h5> Chapitre : {{ $chapitre->name }}</h5>
                        @foreach($chapitre->lecons as $lecon )
                            <div> Leçon : {{ $lecon->name}}</div>
                            <div>{{ $lecon->content}}</div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

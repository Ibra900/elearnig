@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier : ') }} <strong>{{ $formation->name }}</strong> </div>

                <div class="card-body">
                    <form action="" method="POST">
                    @csrf
                    @method('PATCH')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label">{{ __('Titre') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $formation->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
            <!-- { { route('admin.pages.update', $formation) } }  -->
        </div>
    </div>
</div>
@endsection

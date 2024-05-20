<!-- home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Voeg de success-melding toe -->
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <!-- Voeg de knop hier toe -->
                    <div class="mt-4">
                        <a href="{{ route('surveys.index') }}" class="btn btn-primary">
                            {{ __('Bekijk Enquêtes') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enquête overzicht -->
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">{{ __('Beschikbare Enquêtes') }}</div>

                <div class="card-body">
                    <ul>
                        @foreach ($surveys as $survey)
                            <li>
                                <a href="{{ route('surveys.show', $survey->id) }}">{{ $survey->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


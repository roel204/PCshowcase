@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Computer Details') }}</div>

                    <div class="card-body">
                        <h2>{{ $computer->name }}</h2>
                        <p><strong>CPU:</strong> {{ $computer->cpu }}</p>
                        <p><strong>GPU:</strong> {{ $computer->gpu }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

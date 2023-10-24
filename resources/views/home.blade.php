@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                @forelse ($computers as $computer)
                                    <div class="col-md-6">
                                        <a href="{{ route('computer.show', ['id' => $computer->id]) }}">
                                            <div class="card mb-3">
                                                <img src="{{ asset('images/default_pc.jpg') }}" class="card-img-top"
                                                     alt="Default Image">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $computer->name }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <p>No online computers at the moment.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

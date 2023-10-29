@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('home') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" autocomplete="off"
                                       placeholder="Search..."
                                       value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary dropdown-toggle" style="border-radius: 0"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Filters
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach ($tags as $tag)
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}"
                                                       name="tags[]"
                                                       value="{{ $tag->id }}" {{ in_array($tag->id, (array) request('tags')) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                       for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                            </div>
                                        @endforeach

                                    </ul>
                                </div>
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </form>
                        @error('search')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
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
                                        <a href="{{ route('computer.show', ['id' => $computer->id]) }}"
                                           style="text-decoration: none">
                                            <div class="card mb-3">
                                                <img src="{{ $computer->image_link ?: asset('images/default_pc.jpg') }}" class="card-img-top" alt="Computer Image">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $computer->name }}</h5>
                                                    <small class="text-muted">Created
                                                        by: {{ $computer->user->name }}</small>
                                                    <div class="mb-3">
                                                        @foreach ($computer->tags as $tag)
                                                            <span class="badge bg-primary">{{ $tag->name }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <p>There are no computers that match your filters.</p>
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

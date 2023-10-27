@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit') }}</div>

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
                        <h2>Edit Computer</h2>

                        <form method="post" action="{{ route('computer.update', ['id' => $computer->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Computer Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $computer->name }}" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Computer Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ $computer->description }}" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="cpu" class="form-label">CPU</label>
                                <input type="text" class="form-control" id="cpu" name="cpu" value="{{ $computer->cpu }}"
                                       autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="gpu" class="form-label">GPU</label>
                                <input type="text" class="form-control" id="gpu" name="gpu" value="{{ $computer->gpu }}"
                                       autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                @foreach ($allTags as $tag)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}"
                                               name="tags[]" value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $computerTags) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                            </div>


                            <button type="submit" class="btn btn-primary">Update Computer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

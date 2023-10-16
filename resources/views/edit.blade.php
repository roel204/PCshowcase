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
                                       value="{{ $computer->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="cpu" class="form-label">CPU</label>
                                <input type="text" class="form-control" id="cpu" name="cpu" value="{{ $computer->cpu }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="gpu" class="form-label">GPU</label>
                                <input type="text" class="form-control" id="gpu" name="gpu" value="{{ $computer->gpu }}"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Computer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

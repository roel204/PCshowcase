<!-- resources/views/computers/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create') }}</div>

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
                            <h2>Add a New Computer</h2>

                            <form method="post" action="{{ route('computer.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Computer Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="cpu" class="form-label">CPU</label>
                                    <input type="text" class="form-control" id="cpu" name="cpu" required>
                                </div>

                                <div class="mb-3">
                                    <label for="gpu" class="form-label">GPU</label>
                                    <input type="text" class="form-control" id="gpu" name="gpu" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Add Computer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

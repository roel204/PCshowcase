@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Computer Details') }}
                        @if(auth()->user()->id === $computer->user_id || auth()->user()->admin)
                            <form action="{{ route('computer.delete', ['id' => $computer->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </div>

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

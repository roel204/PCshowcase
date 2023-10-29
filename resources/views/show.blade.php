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
                        @if ($computer->image_link)
                            <img src="{{ $computer->image_link }}" class="card-img-top" alt="Computer Image">
                        @else
                            <!-- Display nothing when there's no image link -->
                        @endif
                        <small class="text-muted">Created by: {{ $computer->user->name }}</small>
                        <h2 class="mb-4">{{ $computer->name }}</h2>
                        <div class="mb-3">
                            @foreach ($computer->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <p>{{ $computer->description }}</p>
                        <p><strong>CPU:</strong> {{ $computer->cpu }}</p>
                        <p><strong>GPU:</strong> {{ $computer->gpu }}</p>
                    </div>
                    <hr class="my-4">
                    <div class="card-body">
                        <h2>Comments</h2>

                        @if (auth()->user()->computers->count() > 0)
                            <form method="POST" action="{{ route('computer.comment', ['computer' => $computer->id]) }}">
                                @csrf
                                <div class="input-group">
                                    <textarea class="form-control" id="comment" name="comment" rows="3"
                                              placeholder="Write a comment..." required></textarea>
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </form>
                        @else
                            <p class="text-danger">You're allowed to comment after you post your own PC.</p>
                        @endif
                        @error('comment')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="comments mt-3">
                            @foreach ($computer->comments->reverse() as $comment)
                                <div class="comment mb-3 border p-3">
                                    <p class="mb-0">{{ $comment->comment }}</p>
                                    <small class="text-muted">Commented by: {{ $comment->user->name }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                <button type="submit" class="btn btn-danger">{{__('messages.delete')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="card-body">
                        @if ($computer->image_link)
                            <img src="{{ $computer->image_link }}" class="card-img-top" alt="Computer Image">
                        @else
                            <!-- Display nothing when there's no image link -->
                        @endif
                        <small class="text-muted">{{__('messages.created')}} {{ $computer->user->name }}</small>
                        <h2 class="mb-4">{{ $computer->name }}</h2>
                        <div class="mb-3">
                            @foreach ($computer->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <p>{{ $computer->description }}</p>
                        <p><strong>{{__('messages.cpu')}}</strong> {{ $computer->cpu }}</p>
                        <p><strong>{{__('messages.gpu')}}</strong> {{ $computer->gpu }}</p>
                    </div>
                    <hr class="my-4">
                    <div class="card-body">
                        <h2>{{__('messages.comments')}}</h2>

                        @if (auth()->user()->computers->count() > 0)
                            <form method="POST" action="{{ route('computer.comment', ['computer' => $computer->id]) }}">
                                @csrf
                                <div class="input-group">
                                    <label for="comment" class="visually-hidden">{{__('messages.write_comment')}}</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"
                                              placeholder="{{__('messages.write_comment')}}" required></textarea>
                                    <button type="submit" class="btn btn-primary">{{__('messages.post_comment')}}</button>
                                </div>
                            </form>
                        @else
                            <p class="text-danger">{{__('messages.cant_comment')}}</p>
                        @endif
                        @error('comment')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="comments mt-3">
                            @foreach ($computer->comments->reverse() as $comment)
                                <div class="comment mb-3 border p-3">
                                    <p class="mb-0">{{ $comment->comment }}</p>
                                    <small class="text-muted">{{__('messages.comment_by')}} {{ $comment->user->name }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

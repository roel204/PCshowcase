@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Overview') }}</div>

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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>CPU</th>
                                <th>GPU</th>
                                <th>Edit</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($computers as $computer)
                                <tr>
                                    <td>{{ $computer->name }}</td>
                                    <td>{{ $computer->cpu }}</td>
                                    <td>{{ $computer->gpu }}</td>
                                    <td>
                                        <a href="{{ route('computer.edit', ['id' => $computer->id]) }}"
                                           class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>

                                        <form action="{{ route('computer.toggle-status', ['id' => $computer->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input
                                                type="checkbox"
                                                name="is_online"
                                                {{ $computer->is_online ? 'checked' : '' }}
                                                onchange="this.form.submit()"
                                            >
                                        </form>

                                    </td>
                                    <td>
                                        <form action="{{ route('computer.delete', ['id' => $computer->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

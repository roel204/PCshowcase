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
                                <th class="text-center">{{__('messages.name')}}</th>
                                <th class="text-center">{{__('messages.edit')}}</th>
                                <th class="text-center">{{__('messages.status')}}</th>
                                <th class="text-center">{{__('messages.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($computers as $computer)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ route('computer.show', ['id' => $computer->id]) }}">{{ $computer->name }}</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('computer.edit', ['id' => $computer->id]) }}"
                                           class="btn btn-primary">{{__('messages.edit')}}</a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('computer.toggle-status', ['id' => $computer->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('PUT')
                                            <label for="is_online" class="visually-hidden">{{__('messages.status')}}</label>
                                            <input
                                                type="checkbox"
                                                name="is_online"
                                                id="is_online"
                                                class="form-check-input"
                                                {{ $computer->is_online ? 'checked' : '' }}
                                                onchange="this.form.submit()"
                                            >
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('computer.delete', ['id' => $computer->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{__('messages.delete')}}</button>
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

<a class="nav-item nav-link" href="{{ route('home') }}">Home</a>
<a class="nav-item nav-link" href="{{ route('computer.create') }}">{{__('messages.create')}}</a>
<a class="nav-item nav-link" href="{{ route('computer.overview') }}">{{__('messages.overview')}}</a>

@if(auth()->user() && auth()->user()->admin)
    <a class="nav-item nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
@endif

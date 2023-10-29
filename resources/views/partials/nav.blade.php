<a class="nav-item nav-link" href="{{ route('home') }}">Home</a>
<a class="nav-item nav-link" href="{{ route('computer.create') }}">Create</a>
<a class="nav-item nav-link" href="{{ route('computer.overview') }}">Overview</a>

@if(auth()->user() && auth()->user()->admin)
    <a class="nav-item nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
@endif

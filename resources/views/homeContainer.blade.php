
@if (auth()->check())
    @if (auth()->user()->isAdmin())
        @include('admin.index')
    @elseif (auth()->user()->isUser())
        @include('publicSite.homePage.index')
    @else
        <p>Unauthorized access. Please contact support.</p>
    @endif
@else
    <p>You are not logged in. <a href="{{ route('login') }}">Login here</a>.</p>
@endif

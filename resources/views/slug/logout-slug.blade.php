<div style="text-align: right;">
    <span>{{ 'User: '. Auth::user()->name }}</span>
    <form action="{{ route('logout') }}" style="display: inline-block;">
        @csrf
        <button type="submit">
            Logout
        </button>
    </form>
</div>

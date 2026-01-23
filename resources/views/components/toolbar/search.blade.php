<form method="GET" action="{{ route(Route::currentRouteName()) }}" class="search-box">
    <input
        type="text"
        name="query"
        value="{{ request('query') }}"
        placeholder="Cari..."
        class="search-input"
    >

    <button type="submit" class="btn btn-search">
        Cari
    </button>
</form>

<form method="GET" action="{{ route('user.index') }}" class="search-box">
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

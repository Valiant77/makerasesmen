<form method="GET" class="search-box">
    <input
        type="text"
        name="q"
        value="{{ request('q') }}"
        placeholder="Cari..."
        class="search-input"
    >

    <button type="submit" class="btn btn-search">
        Cari
    </button>
</form>

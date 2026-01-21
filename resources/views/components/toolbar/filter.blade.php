<form method="GET" class="filter-box">
    {{-- jaga search tetap ada --}}
    @if(request('q'))
        <input type="hidden" name="q" value="{{ request('q') }}">
    @endif

    <select name="filter" class="filter-select" onchange="this.form.submit()">
        <option value="">Semua</option>
        <option value="aktif" {{ request('filter') == 'aktif' ? 'selected' : '' }}>
            Aktif
        </option>
        <option value="nonaktif" {{ request('filter') == 'nonaktif' ? 'selected' : '' }}>
            Non Aktif
        </option>
    </select>
</form>

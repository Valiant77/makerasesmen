<form method="GET" class="filter-box">

    @if(request('q'))
        <input type="hidden" name="q" value="{{ request('q') }}">
    @endif


    @if(request('filter'))
        <input type="hidden" name="filter" value="{{ request('filter') }}">
    @endif

    <details class="filter-dropdown">
        <summary class="btn btn-filter">
            <i class="fa-solid fa-filter"></i>
            Filter
        </summary>

        <div class="filter-panel">
            <label>
                Dari tanggal
                <input type="date" name="from" value="{{ request('from') }}">
            </label>

            <label>
                Sampai tanggal
                <input type="date" name="to" value="{{ request('to') }}">
            </label>

            <div class="filter-actions">
                <button type="submit" class="btn btn-primary">
                    Terapkan
                </button>
            </div>
        </div>
    </details>
</form>

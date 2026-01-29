<form method="GET" class="filter-box">

    @if(request('filter'))
        <input type="hidden" name="filter" value="{{ request('filter') }}">
    @endif

    <details class="filter-dropdown">
        <summary class="btn btn-filter">
            <i class="fa-solid fa-filter" style="margin-right: 10px;"></i>
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
                <x-button>
                    Terapkan
                </x-button>
            </div>
        </div>
    </details>
</form>

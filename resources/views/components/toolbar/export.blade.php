<div class="action-buttons">
    <a href="{{ route(explode('.', Route::currentRouteName())[0] . '.export', $routeParams ?? []) }}" class="btn btn-export"><button type="button" class="btn btn-export" title="Export">
    <i class="fa-solid fa-file-export"></i>
    </button>
    </a>
</div>
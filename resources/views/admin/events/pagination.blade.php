    <!-- resources/views/pagination.blade.php -->
<div>
    {{ $paginator->appends(request()->query())->links() }}
</div>


<form action="{{ route( $folder_name . '.destroy', $routeArray ) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button type="submit" rel="tooltip" class="btn btn-white btn-link btn-sm" data-original-title="Delete {{ $module_name }}">
        <i class="material-icons">close</i>
    </button>
</form>

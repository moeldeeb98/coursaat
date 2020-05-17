<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $page_title }}</h4>
                <p class="card-category">{{ $page_desc }}</p>
            </div>
            <div class="card-body">
                <form action="{{ route( $folder_name . '.store') }}" method="post">
                    {{ csrf_field() }}
                    @include('back-end.' . $folder_name . '.form')
                    <button type="submit" class="btn btn-primary pull-right">Add {{ $module_name }}</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

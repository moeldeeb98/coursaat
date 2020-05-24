@extends('back-end.layout.app')


@section('title')
    {{ $page_title }}
@endsection


@section('content')

    @component('back-end.layout.header')

        @slot('nav_title')
            {{ $page_title }}
        @endslot

    @endcomponent

    @component('back-end.shared.table', ['page_title' => $page_title, 'page_desc' => $page_desc])
        @slot('addButton')
            <div class="col-md-4 text-right">
                <a href="{{ route( $folder_name . '.create') }}" class="btn btn-white btn-round">
                    Add {{ $module_name }}
                </a>
            </div>
        @endslot

        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="text-right">control</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{$row->name}}</td>
                        <td class="td-actions text-right">
                            @include('back-end.shared.buttons.edit')
                            @component('back-end.shared.buttons.delete', [
                                'folder_name' => $folder_name,
                                'module_name' => $module_name,
                                'routeArray' => ['skill' => $row->id]
                                ])
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $rows->links() !!}
        </div>

    @endcomponent

@endsection

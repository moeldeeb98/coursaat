@extends('back-end.layout.app')

@php
    $video_id = request()->segment(3);
@endphp

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
        {{--    there is no button here--}}
            </div>
        @endslot

        {{--    Comment Creation --}}
        <form action="{{ route( $folder_name . '.store', $video_id) }}" method="post">
            {{ csrf_field() }}
            @include('back-end.' . $folder_name . '.form')
            <input type="hidden" value="{{ $video_id }}" name="video_id">
            <button type="submit" class="btn btn-primary pull-right">Add {{ $module_name }}</button>
        </form>

        {{--  Comments Display--}}
        <div style="font-size: 200%; padding-top: 50px; padding-bottom: 30px">All Comments</div>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>
                            <small>{{ $row->user->name }}</small>
                            <p>{{ $row->comment }}</p>
                            <small>{{ $row->created_at }}</small>
                        </td>
                        <td class="td-actions text-right">
                            @include('back-end.shared.buttons.edit')
                            @component('back-end.shared.buttons.delete', [
                                'folder_name' => $folder_name,
                                'module_name' => $module_name,
                                'routeArray' => ['video' => $video_id, 'comment' => $row->id]
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

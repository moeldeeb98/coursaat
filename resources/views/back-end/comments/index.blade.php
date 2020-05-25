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
                <a href="{{ route('videos.edit', $video_id) }}" class="btn btn-white btn-round">
                    BACK TO VIDEO
                </a>
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
                            <button rel="tooltip" class="btn btn-white btn-link btn-sm" onclick="$(this).closest('tr').next('tr').slideToggle()" data-original-title="Edit {{ $module_name }}">
                                <i class="material-icons">edit</i>
                            </button>
                            @component('back-end.shared.buttons.delete', [
                                'folder_name' => $folder_name,
                                'module_name' => $module_name,
                                'routeArray' => ['video' => $video_id, 'comment' => $row->id]
                                ])
                            @endcomponent
                        </td>
                    </tr>
                    <tr style="display: none">
                        <td colspan="2">
                            <form  action="{{ route( $folder_name . '.update', ['video' => $video_id, 'comment' => $row->id] ) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                @include('back-end.comments.form')
                                <input type="hidden" name="video_id" value="{{ $video_id }}">
                                <button type="submit" class="btn btn-primary pull-right">Update {{ $module_name }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $rows->links() !!}
        </div>

    @endcomponent

@endsection

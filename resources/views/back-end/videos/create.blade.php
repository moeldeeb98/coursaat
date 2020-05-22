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


    @component('back-end.shared.create', [
            'page_title' => $page_title,
            'page_desc' => $page_desc
        ])
        <form action="{{ route( $folder_name . '.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('back-end.' . $folder_name . '.form')
            <button type="submit" class="btn btn-primary pull-right">Add {{ $module_name }}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent

@endsection

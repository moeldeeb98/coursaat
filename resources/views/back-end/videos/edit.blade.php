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

    @component('back-end.shared.edit',['page_title' => $page_title,'page_desc' => $page_desc])

        @slot('form')
            <form action="{{ route( $folder_name . '.update', [$row] ) }}" method="post" enctype="multipart/form-data">
                {{ method_field('put') }}
                {{ csrf_field() }}
                @include('back-end.' . $folder_name . '.form')
                <button type="submit" class="btn btn-primary pull-right">Update {{ $module_name }}</button>
                <div class="clearfix"></div>
            </form>
        @endslot

        @php $url = getYoutubeId($row->youtube) @endphp
        @if($url)
            <iframe style="margin-bottom: 20px; width: 250px" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allowfullscreen></iframe>
        @endif
        <img width="250" src="{{ url('uploads/videoImages/' . $row->image) }}">

    @endcomponent

    @include('back-end.comments.create');
    @include('back-end.comments.index');

@endsection

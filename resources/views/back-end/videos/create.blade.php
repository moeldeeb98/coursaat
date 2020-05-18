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


    @include('back-end.shared.create')

@endsection

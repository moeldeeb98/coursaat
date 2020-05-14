@extends('back-end.layout.app')

@section('title')
    Home Page
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')

    @component('back-end.layout.header')

        @slot('nav_title')
            Home Page
        @endslot

    @endcomponent

    <h1>Home Page</h1>

@endsection


@push('js')
    <script>

    </script>
@endpush

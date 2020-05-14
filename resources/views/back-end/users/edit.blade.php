@extends('back-end.layout.app')

@php
    $module_name = 'User';
    $page_title =  'Edit ' . $module_name;
    $page_desc = 'Here you can Edit ' . $module_name;

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


@endsection

@extends('back-end.layout.app')

@php
    $module_name = 'User';
    $page_title = 'Create ' . $module_name;
    $page_desc = 'Here you can Create ' . $module_name;

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


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ $page_title }}</h4>
                    <p class="card-category">{{ $page_desc }}</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @include('back-end.users.form')
                        <button type="submit" class="btn btn-primary pull-right">Add {{ $module_name }}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

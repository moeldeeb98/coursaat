@extends('back-end.layout.app')

@php
    $module_name = 'Users';
    $page_title = 'Control ' . $module_name;
    $page_desc = 'Here you can [ Add | Edit | Delete ] ' . $module_name;

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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title ">{{ $page_title }}</h4>
                            <p class="card-category">{{ $page_desc }}</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('users.create') }}" class="btn btn-white btn-round">
                                Add {{ $module_name }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th class="text-right">control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('users.edit', $row->id) }}" rel="tooltip" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $module_name }}">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <form action="{{ route('users.destroy', $row->id ) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" rel="tooltip" class="btn btn-white btn-link btn-sm" data-original-title="Delete {{ $module_name }}">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

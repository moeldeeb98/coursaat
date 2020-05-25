@extends('layouts.app')

@section('title')
    {{ 'Homepage' }}
@endsection

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>Latest Videos</h1>
            </div>
            @include('front-end.shared.video-row')
        </div>
    </div>

@endsection

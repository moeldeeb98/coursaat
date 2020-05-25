@extends('layouts.app')

@section('title')
    {{ $video->name }}
@endsection

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>
                    <a href="{{ route('front.category', ['id' => $video->cat->id]) }}">
                        {{ $video->cat->name }}
                    </a> >> {{ $video->name }}
                </h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @php $url = getYoutubeId($video->youtube) @endphp
                    @if($url)
                        <iframe style="margin-bottom: 20px; width: 100%; height: 500px" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
            </div>

            <div class="row" style="margin-bottom:10px">
                <div class="col-md-2">
                    <span class="font-weight-bold"><i class="nc-icon nc-circle-10"></i> {{ $video->user->name }}</span>
                </div>
                <div class="col-md-4">
                    <span><i class="nc-icon nc-watch-time"></i> {{ $video->created_at }}</span>
                </div>
                <div class="col-md-3"><span class="font-weight-bold">TAGS</span></div>
                <div class="col-md-3"><span class="font-weight-bold">SKILLS</span></div>
            </div>
            <div class="row" style="margin-bottom:30px">
                <div class="col-md-6">
                    <p><i class="nc-icon nc-single-copy-04"></i>{{ $video->desc }}</p>
                </div>
                <div class="col-md-3">
                        <p>
                            @foreach($video->tags as $tag)
                                <a href="{{ route('front.tag', ['id' => $tag->id]) }}">
                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                </a>
                            @endforeach
                        </p>
                </div>
                <div class="col-md-3">
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{ route('front.skill', ['id' => $skill->id]) }}">
                                <span class="badge badge-primary">{{ $skill->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>

            <div class="row">
                @php $comments = $video->comments; @endphp
                <div class="col-md-12">
                    <div class="card card-nav-tabs">
                        <h4 class="card-header card-header-info">Comments ({{count($comments)}})</h4>
                        <div class="card-body">
                            @foreach($comments as $comment)
                                {{ $comment->comment }} <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

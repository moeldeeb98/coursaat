<a href="{{ route('front.video', ['id' => $video->id]) }}" title="{{ $video->name }}">
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="{{ url('uploads/videoImages/' . $video->image) }}" style="max-height: 160px" alt="{{ $video->name }}">
        <div class="card-body">
            <p class="card-text">{{ $video->name }}</p>
            <small class="card-description">{{ $video->created_at }}</small>
        </div>
    </div>
</a>

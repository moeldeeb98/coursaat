<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\comments\Store;
use App\Models\Comment;

trait CommentTrait{
    public function commentStore(Store $request){
        $requestArray = $request->all() + ['user_id' => auth()->user()->id ];
        Comment::create($requestArray);
        return redirect()->route('videos.edit', $requestArray['video_id']);
    }
}

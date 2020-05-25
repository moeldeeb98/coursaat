<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\comments\Store;
use App\Models\Comment;


class CommentsController extends Controller
{

    protected $module_name = 'Comment';
    protected $page_title = 'Control Comments';
    protected $page_desc = 'Here you can [ Add | Edit | Delete ] Comments';
    protected $folder_name = 'comments';

    public function index(){

        $rows = Comment::paginate(10);
        return view('back-end.' . $this->folder_name . '.index', [
                'rows' => $rows,
                'module_name' => $this->module_name,
                'page_title' => $this->page_title,
                'page_desc' => $this->page_desc,
                'folder_name' => $this->folder_name
            ]
        );
    }

    public function store(Store $request){

        $requestArray = $request->all() + ['user_id' => auth()->user()->id];

        Comment::create($requestArray);

        return redirect()->route( $this->folder_name . '.index', $requestArray['video_id']);
    }

    public function update(Store $request, $video, $comment){
        $requestArray = $request->all() + ['user_id' => auth()->user()->id];
        $row = Comment::findOrFail($comment);
        $row->update($requestArray);
        return redirect()->route('comments.index', ['video' => $video, 'comment' => $row]);
    }

    public function destroy($video_id, $comment_id)
    {
        $row = Comment::findOrFail($comment_id);
        $row->delete();
        return redirect()->route($this->folder_name . '.index', $video_id );
    }


}

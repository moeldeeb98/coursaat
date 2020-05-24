<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\videos\Store;
use App\Http\Requests\BackEnd\videos\Update;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;

class VideosController extends BackEndController
{

    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    // to be used in index method
    public function with()
    {
        return ['cat', 'user'];
    }

    // to be used to create and edit methods
    public function append()
    {
        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => []
        ];
        // for edit not create
        $video = request()->route()->parameter('video');
        if($video){
            $array['selectedSkills'] = $this->model->find($video)
                ->skills()->pluck('skills.id')->toArray();
            $array['selectedTags'] = $this->model->find($video)
                ->tags()->pluck('tags.id')->toArray();
            $array['comments'] = $this->model->find($video)
                ->comments()->orderBy('id', 'desc')->with('user')->get();
        }

        return $array;
    }

    public function store(Store $request){

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/videoImages'), $imageName);

        $requestArray = ['user_id' => auth()->user()->id , 'image' => $imageName] + $request->all();
        $row = $this->model::create( $requestArray );

        $this->sync($requestArray, $row);


        return redirect()->route( $this->getFolderName() . '.index');
    }


    public function update($id, Update $request){


        $requestArray = $request->all();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/videoImages'), $imageName);
            $requestArray = ['image' => $imageName] + $requestArray;
        }

        $row = $this->model->findOrFail($id);

        $row->update($requestArray);

        $this->sync($requestArray, $row);

        return redirect()->route( $this->getFolderName() . '.edit', $row);
    }

    /**
     * @param array $requestArray
     * @param $row
     */
    protected function sync(array $requestArray, $row): void
    {
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }

        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
    }

}

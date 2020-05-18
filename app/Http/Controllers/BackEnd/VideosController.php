<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\videos\Store;
use App\Models\Category;
use App\Models\Skill;
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
            'selectedSkills' => []
        ];
        $video = request()->route()->parameter('video');
        if($video){
            $array['selectedSkills'] = $this->model->find($video)
                ->skills()->pluck('skills.id')->toArray();
        }
        return $array;
    }

    public function store(Store $request){

        $requestArray = $request->all() + ['user_id' => auth()->user()->id];
        $row = $this->model::create( $requestArray );

        if(isset($requestArray['skills']) && !empty($requestArray['skills'])){
            $row->skills()->sync($requestArray['skills']);
        }

        return redirect()->route( $this->getFolderName() . '.index');
    }


    public function update($id, Store $request){

        $requestArray = $request->all();

        $row = $this->model->findOrFail($id);

        $row->update($requestArray);

        if(isset($requestArray['skills']) && !empty($requestArray['skills'])){
            $row->skills()->sync($requestArray['skills']);
        }

        return redirect()->route( $this->getFolderName() . '.index', $row);
    }

}

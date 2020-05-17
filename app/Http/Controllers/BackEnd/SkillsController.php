<?php

namespace App\Http\Controllers\BackEnd;



use App\Http\Requests\BackEnd\skills\Store;
use App\Models\Skill;

class SkillsController extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request){

        $this->model::create($request->all());

        return redirect()->route( $this->getFolderName() . '.index');
    }


    public function update($id, Store $request){

        $row = $this->model->findOrFail($id);

        $row->update($request->all());

        return redirect()->route( $this->getFolderName() . '.index', $row);
    }
}

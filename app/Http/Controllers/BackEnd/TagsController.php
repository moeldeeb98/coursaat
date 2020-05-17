<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\tags\Store;
use App\Models\Tag;

class TagsController extends BackEndController
{
    public function __construct(Tag $model)
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

<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller{

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function index(){
        $rows = $this->model;
        $rows = $this->filter($rows);
        $rows = $rows->paginate(10);
        return view('back-end.' . $this->getClassNameFromModel() . '.index', compact('rows'));
    }

    public function create(){
        return view('back-end.' . $this->getClassNameFromModel() . '.create');
    }

    public function edit($id){
        $row = $this->model->findOrFail($id);
        return view('back-end.' . $this->getClassNameFromModel() . '.edit', compact('row'));
    }

    public function destroy($id){
        $this->model->findOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel() . '.index');
    }

    protected function filter($rows){
        return $rows;
    }

    protected function getClassNameFromModel(){
        return strtolower(class_basename($this->model)) . 's';
    }

}

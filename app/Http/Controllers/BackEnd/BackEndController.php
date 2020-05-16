<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller{

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function index(){

        // variables for views
        $module_name = $this->getModelName();
        $page_title = 'Control ' . $this->getPluralModelName();
        $page_desc = 'Here you can [ Add | Edit | Delete ] ' . $this->getPluralModelName();
        $folder_name = $this->getFolderName();


        $rows = $this->model;
        $rows = $this->filter($rows);
        $rows = $rows->paginate(10);
        return view('back-end.' . $this->getFolderName() . '.index', compact(
            'rows','module_name', 'page_title', 'page_desc', 'folder_name'
            )
        );
    }

    public function create(){

        // variables for views
        $module_name = $this->getModelName();
        $page_title = 'Create ' . $module_name;
        $page_desc = 'Here you can Create ' . $module_name;


        return view('back-end.' . $this->getFolderName() . '.create', compact('module_name',
        'page_desc', 'page_title'));
    }

    public function edit($id){

        // variables for views
        $module_name = $this->getModelName();
        $page_title =  'Edit ' . $module_name;
        $page_desc = 'Here you can Edit ' . $module_name;

        $row = $this->model->findOrFail($id);
        return view('back-end.' . $this->getFolderName() . '.edit', compact('row', 'module_name',
        'page_title', 'page_desc'));
    }

    public function destroy($id){
        $this->model->findOrFail($id)->delete();
        return redirect()->route($this->getFolderName() . '.index');
    }

    protected function filter($rows){
        return $rows;
    }

    protected function getFolderName(){
        return strtolower(class_basename($this->model)) . 's';
    }

    protected function getPluralModelName(){
        return $this->getModelName() . 's';
    }

    protected function getModelName(){
        return class_basename($this->model);
    }

}

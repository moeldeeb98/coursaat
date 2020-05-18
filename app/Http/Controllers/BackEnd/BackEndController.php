<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        $with = $this->with();
        if(!empty($with)){
            $rows = $rows->with($with);
        }
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
        $folder_name = $this->getFolderName();
        $append = $this->append();

        return view('back-end.' . $folder_name . '.create', compact(
            'module_name',
            'page_desc',
            'page_title',
            'folder_name'
            )
        )->with($append);
    }

    public function edit($id){

        // variables for views
        $module_name = $this->getModelName();
        $page_title =  'Edit ' . $module_name;
        $page_desc = 'Here you can Edit ' . $module_name;
        $folder_name = $this->getFolderName();
        $append = $this->append();

        $row = $this->model->findOrFail($id);
        return view('back-end.' . $folder_name . '.edit', compact(
            'row',
            'module_name',
            'page_title',
            'page_desc',
            'folder_name'
            )
        )->with($append);
    }

    public function destroy($id){
        $this->model->findOrFail($id)->delete();
        return redirect()->route($this->getFolderName() . '.index');
    }

    protected function filter($rows){
        return $rows;
    }

    protected function with(){
        return [];
    }

    protected function append(){
        return [];
    }

    protected function getFolderName(){
        return strtolower( $this->getPluralModelName() );
    }

    protected function getPluralModelName(){
        return  Str::plural($this->getModelName());
    }

    protected function getModelName(){
        return class_basename($this->model);
    }

}

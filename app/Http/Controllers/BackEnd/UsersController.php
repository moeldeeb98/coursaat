<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\users\Store;
use App\Http\Requests\BackEnd\users\Update;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request){
        $requestArray = $request->all();
        $requestArray['password'] = Hash::make($requestArray['password']);
        $this->model::create($requestArray);

        return redirect()->route( $this->getFolderName() . '.index');
    }


    public function update($id, Update $request){
        $row = $this->model->findOrFail($id);

        $requestArray = $request->all();

        if ( isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] = Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
           }

        $row->update($requestArray);

        return redirect()->route( $this->getFolderName() . '.index', $row);
    }


}

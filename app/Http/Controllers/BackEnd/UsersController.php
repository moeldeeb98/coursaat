<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\User;

class UsersController extends BackEndController
{
    public function index(){
        $rows = User::paginate(10);
        return view('back-end.users.index', compact('rows'));
    }
}

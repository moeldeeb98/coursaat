<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('users.index');
    }


    public function update($id, Request $request){

        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if ($request->has('password') && request()->get('password') != ""){
            $data = $data + ['password' => Hash::make($request->password)];
        }

        $user->update($data);

        return redirect()->route('users.edit', $user);
    }
    

}

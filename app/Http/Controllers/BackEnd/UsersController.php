<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{
    public function index(){
        $rows = User::paginate(10);
        return view('back-end.users.index', compact('rows'));
    }

    public function create(){
        return view('back-end.users.create');
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('users.index');
    }

    public function edit(User $user){
        return view('back-end.users.edit', ['user'=> $user]);
    }

    public function update(User $user, Request $request){

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

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index');
    }
}

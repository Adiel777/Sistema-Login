<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    public function listagem(){
        $user = User::all();
        return view('listagem', [
            'users'=>$user
        ]);
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route(route:'listagem');
    }

    public function editarusuario(User $user){
        return view('editarusuario',[
            'user'=>$user
        ]);
    }

    public function edit(User $user, Request $request){
       $user->name = $request->name;
       if(filter_var($request->email, filter:FILTER_VALIDATE_EMAIL)){
        $user->email = $request->email;
       }
       $user->status = $request->status;
       if(!empty($request->password)){
        $user->password = Hash::Make($request->password);
       }
       $user->save();
       return redirect()->route(route:'listagem');
    }
}

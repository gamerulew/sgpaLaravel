<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function checar(){
    	if(Auth::check()){
            return true;
        }
    	return false;
    }
    public function logar($request){
        $usuario = ['name'=>$request->name,'password'=>$request->password];
        if(Auth::attempt($usuario)){
            return true;
        }
        return false;
    }
    public function criar($request){
        $usuario = new User();
        $usuario->setName($request->name);
        $usuario->setPassword(bcrypt($request->password));
        return $usuario->save();
    }
    public function deletar($request){
        return User::find($request->id)->delete();
    }
    public function deslogar(){
        return Auth::logout();
    }
}

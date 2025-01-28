<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    //
    function index(){
        return view('register');
    }
    function create(Request $req){
        print_r($req->input());
        //$obj_user = new User;
        //$obj_user->name = $req->input('name');
        //$obj_user->email = $req->input('email');
        //$obj_user->password = $req->input('password');
        //print_r($req->input());
        User :: create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>$req->password
        ]);
        return redirect('/users');
    }
}
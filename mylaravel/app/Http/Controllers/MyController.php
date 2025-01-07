<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    function myfunction(Request $req, $var1= " "){
        $data['myinput'] = $req ->input('myinput');
        $data['value_id'] = $var1;
        return view('myview', $data);
    }
}

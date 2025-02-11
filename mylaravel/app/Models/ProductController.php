<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductController extends Model
{
    //
    function index(){
        return view('product');
    }
    function store(Request $req){
        return redirect('/product');
    }
}

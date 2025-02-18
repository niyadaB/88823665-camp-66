<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $timestamps = false;
    public function index()
    {
        $categories = Categories::all();
        //$products = ProductList::with('category', 'user')->get();
        $products = ProductList::all();
        return view('product', compact('categories', 'products'));
    }

    public function store(Request $req)
    {
          // ตรวจสอบว่าได้ล็อกอินแล้วหรือไม่
        // ตรวจสอบและ validate ข้อมูล
        $req->validate([
            'category' => 'required|string|max:255',
            'product_name' => 'required|array',
            'product_name.*' => 'required|string|max:255',
        ]);

        // สร้างหมวดหมู่ใหม่
        $user = session()->get('user');
        $category = Categories::create([
            'name' => $req->category,
        ]);

        // เพิ่มสินค้าโดยเชื่อมโยงกับ category_id และ user_id (จากผู้ที่ล็อกอิน)
        foreach ($req->product_name as $value) {
            ProductList::create([
                'name' => $value,
                'category_id' => $category->id,
                'user_id' => auth()->$user->id,
            ]);
        }

        // ดึงข้อมูลทั้งหมดเพื่อแสดงผล
        $products = ProductList::with('category', 'user')->get();

        // ส่งข้อมูลกลับไปแสดงในหน้าจอ
        return view('product.index', compact('products'));
    }
}

    /*class ProductController extends Controller
{
    //
    function index()
    {
        return view('product');
    }
    function store(Request $req)
    {        $c = new Categories();
        $c->name = $req->name;
        $c->save();
        foreach ($req->product_name as $value) {
            $p = new ProductList();
            $p->name = $value;
            $p->category_id = $c->id;
            //เอาไอดีจากตาราง categories มาใส่ในตาราง product_list
            $p->save();
        }
    }
}*/

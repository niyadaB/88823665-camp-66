<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $table = 'product_lists'; // ชื่อตาราง
    public $timestamps = false; // ปิดการใช้งาน created_at และ updated_at

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
  }
/*class ProductList extends Model
{
    //
    protected $table = "product_list";
        public $timestamps = false; 
      //เชื่อมกับตาราง product_list
      public function categories(){
        return $this->belongsTo(Categories :: class ,'category_id'); 
        //เชื่อมกับตาราง categories โดยมีคีย์เชื่อมระหว่างตาราง product_list กับ categories คือ category_id
  
}
}*/
      
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(ProductList::class, 'category_id');
    }
}


/*class Categories extends Model
{
    //
    protected $table = "categories"; // ชื่อตาราง
    public $timestamps = false; // ไม่มี created_at กับ updated_at ในตาราง
    
}*/
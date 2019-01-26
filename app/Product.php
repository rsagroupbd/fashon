<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
 
	protected $fillable=['product_name','category_id','product_image','slug','product_price','product_status'];
    //

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

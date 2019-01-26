<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Category extends Model
{
	protected $fillable=['category_name','status','parent_id'];
    //

    public function childs() {
        return $this->hasMany('App\Category','parent_id','id') ;
    }

    public function product(){
    	return $this->hasMany(Product::class);
	}
}

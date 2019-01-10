<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){

    	 $categories = Category::with('childs')
        ->where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('category_name','id')->all();

        return view('category')->with('categories',$categories);

        echo '<ul>';
        foreach($categories as $category){
                echo '<li>'.$category->category_name ;
                    if(count( $category->childs) > 0 ){
                       echo  '<ul>';
                        foreach($category->childs as $subcategory){
                           echo  '<li>'. $subcategory->category_name.'</li>';
                        }
                       echo '</ul>';
                    }
               echo  '</li>';                   
        }
        echo '</ul>';
    }
}

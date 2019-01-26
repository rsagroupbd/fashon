<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['comingproduct']=Product::all();

        return view('home')->with('data',$data);
    }

     public function shop($cat=null,$subcat=null)
        {

            $data=Product::paginate(9);
            if($cat & $subcat){
                    echo "success";die();
                    $catid = Category::with('childs')
                    ->where('parent_id', '=', $cat)->firstOrFail();

                $catid=Category::where('category_name', '=', $cat)->where('subcat_')->firstOrFail();
                $data=Product::where('category_id',$catid->id)->where('sub_cat',$catid)->paginate(9);      
            if($cat){
                $catid=Category::where('category_name', '=', $cat)->firstOrFail();
                $data=Product::where('category_id',$catid->id)->paginate(9);            }
                      }
            
            $categories = Category::with('childs')
            ->where('parent_id', '=', 0)->get();
            return view('category')->with('categories',$categories)->with('data',$data);
        }


     public function productdetails($slug){
        $data=Product::where('slug', '=', $slug)->firstOrFail();
        return view('product-details')->with('data',$data);
        }
    }

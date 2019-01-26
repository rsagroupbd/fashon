<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Color;
use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=Product::where('product_status','=',1)->get();

        return view('productlist')->with('data',$data);
    }

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addnewproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug=request('productname');
        $slug=strtolower($slug);
        $slug= str_replace(" ", "-", $slug);
        $slug=preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $slug=$slug.'-'.rand ( 10000 , 99999 );

        if (request()->has('productimage')) {
            $image      = $request->file('productimage');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $dir='productimage';

            Product::create(['product_name'=>request('productname'),'category_id'=>request('productcategory'),'product_price'=>request('productprice'),'slug'=>$slug,'product_image'=>$fileName,'product_status'=>1]);
            $image->move($dir, $fileName);
        }else{
            echo "no image found";
        }
        
      
       return redirect()->route('product.index')->with('success','Product Added Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Product::find($id);
        return view('productview')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Product::find($id);
        return view('productedit')->with('data',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->validate($request,['productname'=>'required']);
        $sku=request('productname');
        $sku=strtolower($sku);
        $sku= str_replace(" ", "-", $sku);
        $sku=preg_replace('/[^A-Za-z0-9\-]/', '', $sku);
        $sku=$sku.'-'.rand ( 10000 , 99999 );
        $status=0;
        if (request()->has('status')) {
            $status=1;
        }
        $data=Product::find($id);
        $currentimage=$data->product_image;
        $data->product_name=request('productname');
        $data->product_status=$status;
        $data->product_espire_time=request('expiredate');

          if (request()->has('productimage')) {
            $image      = $request->file('productimage');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $dir='productimage';
            $productcurrnetImage = public_path("{$dir}/{$currentimage}"); 
            if (File::exists($productcurrnetImage)) { 
            unlink($productcurrnetImage);
            }
            $image->move($dir, $fileName);
            $data->product_image=$fileName;
        }

        
        $data->save();
        return redirect()->back()->with('success','Product Updated Successfully!!');
    }

    public function productdetails($slug){
        $data=Product::where('slug', '=', $slug)->firstOrFail();
       
        return view('product-details')->with('data',$data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

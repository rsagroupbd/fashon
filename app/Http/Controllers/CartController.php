<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Redirect;

class CartController extends Controller
{
    //


    public function showcart(){
    	$cartitem=Cart::content();
    	return view('cart')->with('cartitems',$cartitem);
    }
    public function add_to_cart(){
    	$data['qty']=1;
    	$data['id']=222;
    	$data['name']='Wood Watch blue';
    	$data['price']=600;
    	$data['options']=['size'=>'ZK','color'=>'blue'];
    	Cart::add($data);
    	return Redirect::to('/cart');
    }
}

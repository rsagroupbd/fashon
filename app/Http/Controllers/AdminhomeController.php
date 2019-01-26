<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DB;

class AdminhomeController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        $user=DB::table('users')
        ->select(DB::raw(('count(*) as usercount')))
        ->get();
        $product=DB::table('products')
        ->select(DB::raw(('count(*) as proudctcount')))
        ->get();

        return view('adminhome')->with('user',$user)->with('product',$product);
    }

    public function userslist()
    {   
        $data=User::all();
       return view('userslist')->with('data',$data);
    }
}

<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use Auth;
use File;
class AccountController extends Controller
{
    //

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function changepassword(){
    	return view('passwordchange');
    }

    public function actionchangepassword(Request $request){
    	 if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current_password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password =  Hash::make($request->get('password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

    public function viewprofile(){
    	return view('userprofile');
    }

    public function uploadprofileimage(Request $request,$id){
    	$validatedData = $request->validate([
            'profileimage' => 'required',
        ]);

    	$image      = $request->file('profileimage');
	    $fileName   = time() . '.' . $image->getClientOriginalExtension();
    	$dir='profileimage';
    	$pro=Auth::user()->profile_image;
    	if ($pro!="") {
    		$usersImage = public_path("{$dir}/{$pro}"); 

	        if (File::exists($usersImage)) { 
	            unlink($usersImage);
	        }
    	}
    	
    	$user = Auth::user();
    	$user->profile_image=$fileName;
    	$image->move($dir, $fileName);
    	$user->save();
    	 return redirect()->back()->with("success","Password changed successfully !");
		}

}

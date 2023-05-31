<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    public function index(){
        if (Auth::id()){
           $usertype=Auth()->user()->usertype;
           if($usertype=='user'){
            return Redirect::to('http://facebook.com');
            
           }else if ($usertype=='admin'){
                return view('dashboard');
           } 
           else{
            return redirect()->back();
           }
        }
    }

    public function post(){
        return view ("post");
    }
}

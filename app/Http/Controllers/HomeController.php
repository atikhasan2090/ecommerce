<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        
        if($usertype==0){
            return view('dashboard');
        }else{
            return view('admin.dashboard');
        }
    }
}
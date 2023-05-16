<?php

namespace App\Http\Controllers;

use App\Models\HystoryProduct;
use App\Models\Produit;
use Auth;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index(){

        $to = "";
        $from ="";

        $data = HystoryProduct::latest()->where('user_id',Auth::user()->id)->get();
        
        return view('pages.rapport.entries',compact("data","to","from"));
    }
}

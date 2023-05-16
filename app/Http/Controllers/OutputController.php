<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutputController extends Controller
{
    public function index(){

        $from = "";
        $to = "";
        $data = OrderDetails::latest()->where("user_id",Auth::user()->id)->get();
        return view('Pages.rapport.outputs',compact('data','from','to'));
    }
}

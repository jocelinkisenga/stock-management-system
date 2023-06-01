<?php

namespace App\Http\Controllers;

use App\Http\Repositorie\StockRepositorie;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutputController extends Controller
{
    public $stock;
    public function __construct(){
        $this->stock = new StockRepositorie();
    }
    public function index(){

        $from = "";
        $to = "";
        $data = OrderDetails::latest()->where("user_id",Auth::user()->id)->get();
        return view('Pages.rapport.outputs',compact('data','from','to'));
    }

    public function search(Request $request){
        dd($this->stock->output($request->from, $request->to));
    }
}

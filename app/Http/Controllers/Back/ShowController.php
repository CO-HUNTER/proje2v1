<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ShowController extends Controller
{
    //
    public function products(){

        $query=DB::table('products')->get();
        return view('back.products',compact('query'));
    }
}

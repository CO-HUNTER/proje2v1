<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ResponseController extends Controller
{
    //

    public function barcodeQuery(Request $request){

        $product=DB::table('products')->where('barcode',$request->value)->first();
        $product=json_encode($product);
        return response($product);
    }

    public function finish(Request $request){

      
        return response($request->all());
    }
}

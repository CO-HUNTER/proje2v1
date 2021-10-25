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
      
      $lastId=  DB::table('customer')->insertGetId([
            'total_amount' =>$request->totalAmount
        ]);
      $ids=$request->id;
      $quantity=$request->quantity;

      for($i=0;$i<count($ids);$i++){
        DB::table('basket')->insert([
            'product' => $ids[$i],
            'customer' => $lastId,
            'quanity' =>$quantity[$i]
        ]);

      }
      
      
        return response("başarılı");
    }
}

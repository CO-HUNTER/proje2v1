<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    //
    public function products(Request $request)
    {
        $barcode = $request->barcode;
        $name=$request->ad;
        $query = DB::table('products')
        ->where('barcode', 'like', "%$barcode%")
        ->where('product_name', 'like', "%$name%")
        ->simplePaginate(15);
        return view('back.productslist', compact('query'));
    }

    public function shopList()
    {

        $query = DB::table('customer')->get();
        $products=[];
            foreach($query as $item){
             $products[]=DB::table('basket')->select(['products.product_name','basket.quanity'])
             ->join('products','basket.product','=','products.product_id')
             ->where('basket.customer',$item->customer_id)->get();
            }
           // dd($products);
       return view('back.shoplist',compact(['query','products']));
    }
}

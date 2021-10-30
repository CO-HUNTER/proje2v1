<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class UpdateController extends Controller
{
    //

    public function updateProduct(Request $request,$id){

        $request->validate([
            'update_product_name' => 'required|min:3',
            'update_product_barcode' => 'required|min:8|max:13',
            'update_product_price' => 'required'
        ]);
      
        DB::table('products')->where('product_id', $id)->update([
            'product_name' => $request->update_product_name,
            'barcode' => $request->update_product_barcode,
            'price' => $request->update_product_price
        ]);
        return back()->with('success','Ürün başarıyla güncellendi');

    }
}

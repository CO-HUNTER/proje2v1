<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AddController extends Controller
{
    //

    public function addProduct(Request $request){
        $request->validate([
            'ad' => 'required|min:3',
            'barkod' => 'required|min:13|max:13',
            'fiyat' => 'required'
        ]);

        DB::table('products')->insert([
            'product_name' => $request->ad,
            'barcode' => $request->barkod,
            'price' =>  $request->fiyat
        ]);

        return back()->with('success','Ürününüz başarıyla eklendi');
    }
}

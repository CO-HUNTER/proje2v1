<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
class AddController extends Controller
{
    //

    public function addProduct(Request $request){
     
        $messages=[
            'unique' => 'Bu barkod ile daha önce ürün kayıt edilmiş',
            'numeric' => 'Fiyat sayısal bir değer içermelidir'
        ];
        Validator::make($request->all(),[
                 'ad' => 'required|min:3',
            'barkod' => 'required|min:8|max:13|unique:products,barcode',
            'fiyat' => 'required|numeric'
        ],$messages)->validate();
        DB::table('products')->insert([
            'product_name' => $request->ad,
            'barcode' => $request->barkod,
            'price' =>  $request->fiyat
        ]);

        return back()->with('success','Ürününüz başarıyla eklendi');
    }
}

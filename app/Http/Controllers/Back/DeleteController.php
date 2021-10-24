<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DeleteController extends Controller
{
    //
    public function deleteProduct($id){
        DB::table('products')->where('product_id',$id)->delete();
        return back()->with('success','Ürün silindi');
    }
}

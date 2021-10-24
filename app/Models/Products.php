<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products extends Model
{
    use HasFactory;
    protected $table="products";

    public static function getRecords(){
        $records=DB::table('products')->get();

        return $records;
    }
}

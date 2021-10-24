<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Exports\ProductsExport;
use Excel;
class ImportOperationsController extends Controller
{
    //
    public function recordsExport(){
        return Excel::download(new ProductsExport,'records.xlsx');
    }
}

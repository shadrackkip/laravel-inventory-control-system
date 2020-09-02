<?php

namespace App\Http\Controllers;

use App\Product;
use App\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    //
    function store(Request $request){


        $create_variants=new Variation();
        $create_variants->stock_id=$request->stock_id;
        $create_variants->variations=json_encode($request->items);
        $create_variants->save();
        return response()->json([
          'stock_id'=>$request->stock_id
        ]);
    }
    function add_product(){
        $product=new Product();
        return response()->json([
            'resp'=>'jjj'
        ]);
    }
}

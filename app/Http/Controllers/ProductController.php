<?php

namespace App\Http\Controllers;

use App\AttributeMaterial;
use App\Material;
use App\Product;
use App\Variation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function create_product(){
        return view('pages.inventory.create_product');
    }

    function add_product(Request $request){





            $product=new Product();
            $product->stock_id=$request->stock_id;
            $product->name=$request->product_name;
            $product->category=$request->category_id;
            $product->unit_of_measure=$request->unit_of_measure;
            $product->additional_information=$request->more_info;
            $product->save();

        toastr()->success('Product saved successfully');
        return back();
    }
    //
}

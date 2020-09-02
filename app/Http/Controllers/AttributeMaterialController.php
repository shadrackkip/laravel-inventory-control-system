<?php

namespace App\Http\Controllers;

use App\AttributeMaterial;
use App\MaterialProduct;
use Illuminate\Http\Request;

class AttributeMaterialController extends Controller
{
    //
    function getAtts(Request $request){
       $attributes = AttributeMaterial::where('material_id',$request->id)->get();
       foreach ($attributes as $attribute){
      echo "
      <div class='form-group'>
      <label>$attribute->name</label>
      <select name='variation[$attribute->name][]' class='form-control'>
      <option>select</option>";
           foreach (json_decode($attribute->attributes) as $dt){
               echo "
          <option value='$dt'>$dt</option>
            ";
           }
       echo "</select>

</div>
      ";
       }

    }

    function create_ingredients(Request $request){


        $ingridients=new MaterialProduct();
        $ingridients->product_id=$request->id;
        $ingridients->material_id=$request->material;
        $ingridients->attributes=json_encode($request->variation);
        $ingridients->qty=$request->qty;
        $ingridients->stock_cost=$request->stock_cost;
        $ingridients->reorder_point=$request->re_order_point;
        $ingridients->save();

        toastr()->success('Product ingridients saved');
        return back();
    }

}

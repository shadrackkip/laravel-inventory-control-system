<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Product;
use App\Variation;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.inventory.products');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.inventory.products');
    }

    function create_product(){
        $stock_id=rand(1000,100000000);
        return redirect('/admin/inventory/create_product/'.$stock_id);
    }

    function view_product(Request $request){

        $product=Product::findOrFail($request->prod_id);
        return view('pages.inventory.add_materials')->with([
            'product'=>$product
        ]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     */
    public function show(Product $product,Request $request)
    {
        //
        $product=$product->findOrFail($request->prod_id);
        $items=array();
        $products=array();
        $attributes=  Variation::where('stock_id',$product->stock_id)->first();

        foreach (json_decode($attributes->variations) as $vars){
            array_push($items,explode(',',$vars->value));
        }
        for($i=0;$i<count($items);$i++) {
            foreach ($items[0] as $item) {
                if($i!==0) {
                    foreach ($items[$i] as $item1) {
                        array_push($products, $item . '/' . $item1);
                    }
                }
            }
        }

        return view('pages.inventory.details')->with([
            'product'=>$product,
            'variations'=>$products
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}

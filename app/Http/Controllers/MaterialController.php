<?php

namespace App\Http\Controllers;

use App\AttributeMaterial;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.inventory.raw');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $track_id=rand(1000,1000000);
        return view('pages.inventory.create_material')->with('track_id',$track_id);
    }
    public function createAttributes(Request $request){
        $materialAtt=new AttributeMaterial();
        $materialAtt->attributes=json_encode($request->value);
        $materialAtt->name=$request->name;
        $materialAtt->track_id=$request->track_id;
        $materialAtt->save();



    }

    public function getAttributes(Request $request){
    $getAtt=AttributeMaterial::where('track_id',$request->track_id)->get();
        return response()->json(
           $getAtt
        );
    }

    public function createMaterial(Request $request){

        $items=array();
      $attributes=  AttributeMaterial::where('track_id',$request->track_id);
      foreach ($attributes->get() as $att){
          foreach (json_decode($att->attributes) as $attribute){
              array_push($items,$attribute);
          }
      }

      foreach ($items as $item){
          $material=new Material();
          $material->name=$item.' / '.$request->material_name;
          $material->units=$request->units;
            $material->save();
      }

      $attributes->update([
          'material_id'=>$request->track_id
      ]);
      toastr()->success('Material saved successfully');
      return back();
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
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}

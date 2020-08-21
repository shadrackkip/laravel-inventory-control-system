<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{

    private $brand_logos;

    public function __construct()
    {
        $this->brand_logos=public_path('/brands');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.brands.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.brands.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $brand=new Brand();
        $brand->name=$request->brand;

        if($request->hasFile('brand-logo')){
            $oname=basename($request->file('brand-logo')->getClientOriginalName());
            $new_name = time().'_'.$oname;
            $img=Image::make($request->file('brand-logo'))
                ->fit(200, 200, function ($constraints) {
                    //  $constraints->aspectRatio();
                    $constraints->upsize();
                });
            $img->save($this->brand_logos . '/' . $new_name);
            $brand->logo=$new_name;
        }
        $brand->save();
        toastr()->success('Brand saved successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}

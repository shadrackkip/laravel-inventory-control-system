<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    private $photos_path;
    private $documents_path;

    public function __construct()
    {
        $this->photos_path=public_path('/company_logos');
        $this->documents_path=public_path('/company_documents/');
    }

    public function index()
    {
        //
        return  view('pages.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        return view('pages.suppliers.create');
    }


    public function store(Request $request)
    {
        //
        $supplier=new Supplier();
        $supplier->name=$request->name;
        $supplier->contact_email=$request->email;
        $supplier->contact_phone=$request->phone;
        $supplier->status=$request->status;

        if($request->hasFile('company-logo')){
            $oname=basename($request->file('company-logo')->getClientOriginalName());
            $new_name = time().'_'.$oname;
            $img=Image::make($request->file('company-logo'))
                ->fit(500, 500, function ($constraints) {
                    //  $constraints->aspectRatio();
                    $constraints->upsize();
                });
            $img->save($this->photos_path . '/' . $new_name);
            $supplier->logo=$new_name;
        }
        if($request->hasFile('company-profile')){

           $target_file = $this->documents_path . basename($_FILES["company-profile"]["name"]);
            $new_name = time().'_'.$target_file;
            $docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if($docFileType!='pdf'){
                toastr()->error('Company profile should be in pdf format');
                return back();
            }

            if (file_exists($target_file)) {
                toastr()->error('Company profile file with that name already exist, try renaming the file');
               return back();
            }
            if (move_uploaded_file($_FILES["company-profile"]["tmp_name"], $target_file)) {
                $supplier->company_profile=$_FILES["company-profile"]["name"];

            } else {

                toastr()->error('Sorry, there was an error uploading your file.');
            }
        }
        $supplier->save();
        toastr()->success('Supplier saved successfully');
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}

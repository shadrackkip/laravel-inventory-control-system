<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    private $resized_photos_path;
    private $large_photos_path;
    //users
    public function __construct()
    {
        $this->resized_photos_path = public_path('/user_images/small');
        $this->large_photos_path = public_path('/user_images/large');
    }

    function users(Request  $request){
        return view('pages.users.index');

    }
    function addUser(Request $request){
     return view('pages.users.create');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone_number'   => 'required|max:12',
            'role'   => 'required',
            'email'   => 'required|unique:admins',

        ]);

    }
    function createUser(Request $request){

        $this->validator([
            'email' => $request->email,
            'role' => $request->role,
            'phone_number' => $request->phone,
        ]);


        $admin = new Admin();
        $admin->name=$request->names;
        $admin->email=$request->email;
        $admin->phone_number=$request->phone;
        $admin->role=$request->role;
        $admin->password=Hash::make(mt_rand(100000,999999));
        $admin->name=$request->names;

        if($request->hasFile('avatar')){

            if (!is_dir($this->resized_photos_path)) {
                mkdir($this->resized_photos_path, 0777);
            }
            $oname=basename($request->file('avatar')->getClientOriginalName());
            $new_name = time().'_'.$oname;
            $img=Image::make($request->file('avatar'))
                ->fit(500, 500, function ($constraints) {
                    //  $constraints->aspectRatio();
                    $constraints->upsize();
                });
            $img2=Image::make($request->file('avatar'))
                ->fit(30, 30, function ($constraints) {
                    //  $constraints->aspectRatio();
                    $constraints->upsize();
                });
            $img->save($this->large_photos_path . '/' . $new_name);
            $img2->save($this->resized_photos_path . '/' . $new_name);
            $admin->avatar=$new_name;

        }else{
            $admin->avatar='noimage.png';
        }
        if($admin->save()){
            toastr()->success('User created successfully!');
            return back();
        }else{
            toastr()->error('Failed to save error! check form for errors');
            return back();
        }

        //send password to email

    }
}

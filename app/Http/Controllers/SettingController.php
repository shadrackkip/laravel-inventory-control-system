<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    function general(){
        return view('pages.settings.general');
    }
    function units_of_measure(){
        return view('pages.settings.units_of_measure');
    }
    function store_units_of_measure(Request $request){
        $get_setting=Setting::where('key','units_of_measure')->first();


        if($get_setting!==null){
            $new_units_items=array();
            $decoded_settings=json_decode($get_setting->value);
            $new_units_items=$decoded_settings;
            if(!in_array($request->units_of_measure,$decoded_settings)){
                array_push($new_units_items,$request->units_of_measure);
            }
            $get_setting->value=json_encode($new_units_items);
            $get_setting->save();
            toastr()->success('Setting saved');
            return back();

        }else{
            $units_arr=array();
            $setting=new Setting();
            $setting->key='units_of_measure';
            $setting->user_id=auth('admin')->user()->id;
            array_push($units_arr,strtolower($request->units_of_measure));
            $setting->value=json_encode($units_arr);
            $setting->save();
            toastr()->success('Setting saved');
            return back();

        }

    }
    function tax_rates(){
        return view('pages.settings.tax_rates');
    }
    function operations(){
        return view('pages.settings.operations');
    }
    function data_import(){
        return view('pages.settings.data_import');
    }
}

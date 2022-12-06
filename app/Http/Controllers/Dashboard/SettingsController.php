<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function editShippingMethods($type){

        // shipping types : free , inner , outer

        if ($type === 'free'){
            $shippingMethod = Setting::where('key' , "free_shipping_label") -> first();
        }elseif($type === 'inner'){
            $shippingMethod = Setting::where('key' , "local_label") -> first();
        }elseif($type === 'outer'){
            $shippingMethod = Setting::where('key' , "outer_label") -> first();
        }else{
            $shippingMethod = Setting::where('key' , "free_shipping_label") -> first();
        }

        return view("dashboard.settings.shippings.edit",compact('shippingMethod'));
    }


    public function updateShippingMethods($id){

    }
}

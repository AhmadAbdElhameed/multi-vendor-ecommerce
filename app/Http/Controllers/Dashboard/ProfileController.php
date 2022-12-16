<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Validator;
class ProfileController extends Controller
{
    public function editProfile(){
        $admin = Admin::find(auth('admin') -> user()->id);
        return view("dashboard.profile.edit",compact("admin"));
    }



    // public function updateProfile(ProfileRequest $request){

    //     try{
    //         $admin = Admin::find(auth('admin') -> user()->id);

    //         $admin -> update($request ->only(['email','name']));

    //         return redirect()-> back() -> with(['success' => 'تم التحديث بنجاح']);

    //     }catch(\Exception $ex){
    //         return redirect()-> back() -> with(['error' => 'هناك خطا ما يرجي المحاوله لاحقا']);

    //     }
    // }

    public function updateProfile(ProfileRequest $request)
    {
        //validate
        // db

        try {

            $admin = Admin::find(auth('admin')->user()->id);


            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }

            unset($request['id']);
            unset($request['password_confirmation']);  // password_confirm => give me error 

            $admin->update($request->all());

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }

    }
}

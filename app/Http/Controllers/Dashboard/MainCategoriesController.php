<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\MainCategoryRequest;

class MainCategoriesController extends Controller
{
    public function index(){
        $categories = Category::parent() -> paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index',compact('categories'));
    }
    public function create(){

        return view('dashboard.categories.create');
    }
    public function edit($id){

        $category = Category::orderBy('id','DESC')->find($id);

        if (!$category){
            return redirect()->route('admin.main_categories')->with(['error' => 'هذا القسم غير موجود']);

        }

        return view('dashboard.categories.edit',compact('category'));
    }

    public function update($id,MainCategoryRequest $request){

        try{// validation :: Done

            // Save in database

            if(!$request -> has('is_active')){
                $request->request->add(['is_active' => 0]);
            }
            else($request->request->add(['is_active' => 1]));


            $category = Category::find($id);

            if (!$category){
            return redirect()->route('admin.main_categories')->with(['error' => 'هذا القسم غير موجود']);
            }

            $category -> update($request->all());

            // Save name in categories_translations table in database
            $category -> name = $request->name;
            $category -> save();

            return redirect()->route('admin.main_categories')->with(['success' => 'تم التحديث بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('admin.main_categories')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

    public function delete($id){

        try{

        // get the category by id
        $category = Category::orderBy('id','DESC')->find($id);

        if(!$category){
            return redirect()->route('admin.main_categories')->with(['error' => 'هذا القسم غير موجود']);
        }

        $category -> delete();

        return redirect()->route('admin.main_categories')->with(['success' => 'تم الحذف بنجاح']);

    }catch(\Exception $ex){
        return redirect()->route('admin.main_categories')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
    }

    }
}

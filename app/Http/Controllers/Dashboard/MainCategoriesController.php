<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class MainCategoriesController extends Controller
{
    public function index(){
        $categories = Category::parent() -> paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index',compact('categories'));
    }
    public function create(){


    }
    public function edit($id){

        $category = Category::find($id);

        if (!$category){
            return redirect()->route('admin.main_categories')->with(['error' => 'هذا القسم غير موجود']);

        }

        return view('dashboard.categories.edit',compact('category'));
    }
}

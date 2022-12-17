<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class MainCategoriesController extends Controller
{
    public function index(){
        return $categories = Category::parent() -> paginate(PAGINATION_COUNT);
        //return view('dashboard.categories.index',compact('categories'));
    }
    public function create(){


    }
}

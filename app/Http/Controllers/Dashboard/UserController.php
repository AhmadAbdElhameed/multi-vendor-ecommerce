<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return "test preficx";
    }
    public function home(){
        return "Home Page";
    }

    public function welcome(){
        return "Welcome";
    }
    public function test(){
        return "Test";
    }
}

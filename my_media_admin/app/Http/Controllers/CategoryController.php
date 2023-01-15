<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
        //return to view template
        public function index(){
            return view('admin.category.index');
        }
}

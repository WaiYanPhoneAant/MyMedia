<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    //
    public function category(){
        $category=Category::get();
        return response()->json(['category'=>$category],200);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //return to view template
    public function index(){
        return view('admin.post.index');
    }
}

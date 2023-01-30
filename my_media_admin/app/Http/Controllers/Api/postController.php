<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postController extends Controller
{
    //
    public function posts(){
        $posts=Post::select('posts.*','categories.name as category')
        ->OrderBy('id','DESC')
        ->leftJoin('categories','posts.category_id','categories.category_id')
        ->when(request('searchKey'),function($query){
            $query->where('title','like','%'.request('searchKey').'%');

        })->when(request('category'),function($query){
            $query->where('categories.name',request('category'));
        })->get()->toArray();
        return response()->json(['post'=>$posts],200);
    }
    //search posts
    // public function search(Request $request)
    // {
    //     # code...
    //     $posts=Post::select('posts.*','categories.name as category')
    //     ->leftJoin('categories','posts.category_id','categories.category_id')
    //     ->where('title','like','%'.$request->searchKey .'%')
    //     ->get()
    //     ->toArray();
    //     logger($posts);
    //     return response()->json(['post'=>$posts],200);

    // }
}

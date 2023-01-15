<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //return to view template
    public function index(){
        return view('admin.profile.index');
    }
    public function Accupdate(Request $request){
        $data=$this->UpdateData($request);
        User::where('id',Auth::user()->id)->update($data);
        return back();
    }


    private function UpdateData($request)
    {
        # code...
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'address'=>$request->address,

        ];
    }
}

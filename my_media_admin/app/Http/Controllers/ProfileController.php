<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class ProfileController extends Controller
{
    //return to view template
    public function index(){
        return view('admin.profile.index');
    }
    public function Accupdate(Request $request){
        $data=$this->UpdateData($request);
        $this->AdminDataValidator($data);
        User::where('id',Auth::user()->id)->update($data);
        return back()->with(['success'=>'Update Success']);
    }


    private function UpdateData($request)
    {
        # code...
        return [
            'name'=>$request->adminName,
            'email'=>$request->adminEmail,
            'phone'=>$request->adminPhone,
            'gender'=>$request->adminGender,
            'address'=>$request->adminAddress,

        ];
    }
    private function AdminDataValidator($request){

        return Validator::make($request,[
            'name'=>'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ])->validate();
    }
}

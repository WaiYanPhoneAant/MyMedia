@extends('admin.layouts.app')
@section('profile','active text-white bg-primary')
@section('header','Profile')
@section('content')
    <div class="m-3">
        <form action="{{route('admin#update')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label" >Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1"  value="{{Auth::user()->email}}" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone"  value="{{Auth::user()->phone}}" id="Phone" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Gender</label>
                <select class="form-select" name="gender" aria-label="Choose your Gender">
                    <option selected>Choose your Gender</option>
                    <option value="male" {{Auth::user()->gender=='male'?'selected':''}}>Male</option>
                    <option value="female" {{Auth::user()->gender=='female'?'selected':''}}>Female</option>

                  </select>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="" cols="30" rows="5">{{Auth::user()->address}}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>


          </form>
    </div>
@endsection

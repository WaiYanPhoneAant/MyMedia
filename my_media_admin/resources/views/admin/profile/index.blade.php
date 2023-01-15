@extends('admin.layouts.app')
@section('profile','active text-white bg-primary')
@section('header','Profile')
@section('content')
    <div class="m-3">
        <form action="{{route('admin#update')}}" method="POST">
            @csrf
            @if (session('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label" >Name</label>
                <input type="text" class="form-control" name="adminName" id="name" value="{{old('adminName',Auth::user()->name)}}" aria-describedby="emailHelp">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="adminEmail" id="exampleInputEmail1"  value="{{old('adminEmail',Auth::user()->email)}}" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <input type="number" class="form-control" name="adminPhone"  value="{{old('adminPhone',Auth::user()->phone)}}" id="Phone" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Gender</label>
                <select class="form-select" name="adminGender" aria-label="Choose your Gender">
                    <option selected>Choose your Gender</option>
                    <option value="male" {{old('adminGender',Auth::user()->gender)=='male'?'selected':''}}>Male</option>
                    <option value="female" {{old('adminGender',Auth::user()->gender)=='female'?'selected':''}}>Female</option>

                  </select>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <textarea name="adminAddress" class="form-control" id="" cols="30" rows="5">{{old('adminAddress'),Auth::user()->address}}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>


          </form>
    </div>
@endsection

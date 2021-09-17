@extends('layout.app')
@section('title','Register')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-lg-6 col-md-10 mx-auto">
      <h1 class='text-center'>Register Your Account</h1>
     
        <br>
  @if($errors->any())
 
    @if($errors->count()==1)
   <span style="color:red"> {{$errors->first()}}</span>
  @else
  <div class="alert alert-danger">
        <ul style="list-style-type:none;">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    
    </div>
    @endif
  @endif

@if(session()->has('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif

        <form action="{{url('/register')}}" method="post">
        @csrf
          <div class="control-group">
              <label>Full Name</label>
              <input type="text" class="form-control" placeholder="Enter full name" value="{{old('full_name')}}" name="full_name"> 
          </div>
          <br>
         
         
          <div class="control-group">
              <label>Email Address</label>
              <input type="email" class="form-control" placeholder="Enter email address" value="{{old('email')}}"   name="email">
          </div>
         <br>
         <div class="control-group">
              <label>Phone Number</label>
              <input type="text" class="form-control" placeholder="Enter Phone Number" value="{{old('phone_number')}}"   name="phone_number">
          </div>
         <br>
       
         <div class="control-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Enter Password"   name="password">
          </div>
       
         <br>
         <div class="control-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" placeholder="Enter confirm password"   name="password_confirmation">
          </div>
          <br>
          <button type="submit" class="btn btn-success w-100" >Register</button>
        </form>
      </div>
    </div>
  </div>
@endsection
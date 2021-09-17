@extends('layout.app')
@section('title','login')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-10 mx-auto">
      <h1 class="text-center">Login your Account</h1>
        <br>
    
  @if($errors->any())
 
    @if($errors->count()==1)
   <span style="color:red">{{$errors->first()}}</span>
  @else
  <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    
    </div>
    @endif
  @endif

@if(session()->has('message'))
<div class="alert alert-{{session('type')}}">
{{session('message')}}
</div>
@endif
   

        <form action="{{url('/login')}}" method="post">
        @csrf
          <div class="control-group">
              <label for="email">Email_address</label>
              <input type="text" class="form-control" value="{{old('email')}}" name="email"> 
          </div>
          <br>
         
         
          <div class="control-group">
              <label for="password">password</label>
              <input  type="password" class="form-control"  name="password">
          </div>
          <br>
        
         <button type="submit" class="btn btn-success w-100" >Login</button>
        </form>
      </div>
    </div>
  </div>
@endsection
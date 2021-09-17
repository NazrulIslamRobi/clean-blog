@extends('layout.app')
@section('title','Add-category')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{route('dashbord')}}" class="btn btn-info">Back to Dashbord</a>
        <a href="{{route('index.category')}}" class="btn btn-info">All Category</a>
        <br>
        <br>
        @if($errors->any())
      <div class="alert alert-danger">
          <ul >
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          
          </ul>
      </div>
      @endif
        <form action="{{route('store.category')}}" method="post">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>category_name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name"> 
            </div>
          </div>
          <br>
         
         
        <div class="status">
        <select class="form-control" name="status" >
        <option value="1">active</option>
        <option value="0">inactive</option>
        </select>
        
        </div>
         <br>
        
          <button type="submit" class="btn btn-primary" name="submit-btn">submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
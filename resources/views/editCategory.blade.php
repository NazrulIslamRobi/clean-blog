@extends('layout.app')
@section('title','edit-category')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{route('show.category')}}" class="btn btn-danger">Add Category</a>
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
      <form action="{{route('update.category',$category->id)}}" method="post">
        @csrf
        @method('PUT')
          <div class="control-group">
            <div class="form-group  controls">
              <label>Category Name :</label>
              <input type="text" class="form-control" value="{{$category->name}}" name="name"> 
            </div>
          </div>
          <br>
         
         
        <div class="status">
        <label for="Status">Status :</label>
        <select class="form-control" name="status" >
        <option value="1" @if ($category->status ===1) selected @endif >active</option>
        <option value="0" @if($category->status===0) selected @endif>inactive</option>
        </select>
        
        </div>
         <br>
        
          <button type="submit" class="btn btn-primary" name="submit-btn">UPDATE</button>
        </form>
      </div>
    </div>
  </div>
@endsection
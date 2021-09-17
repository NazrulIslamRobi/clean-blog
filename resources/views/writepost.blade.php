@extends('layout.app')
@section('title','Post')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       
        <a href="{{route('index.category')}}" class="btn btn-info">All Category</a>
        <a href="{{route('posts.index')}}" class="btn btn-info">View Post</a>
        <br>
        <br>
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        
        </div>
      @endif
      
        <form  action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Title" value="{{old('title')}}" name="title">
             
            </div>
          </div>
          <br>
         
          <div class="control-group">
              <select class="form-control" name="category_id">
              <option value selected hidden>---SELECT YOUR CATEGORY---</option>
             @foreach($category as $categoryName)
              <option value="{{ $categoryName->id }}">{{ $categoryName->name }}</option>
              @endforeach
              </select>
            </div>
           
            <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>post image</label>
              <input type="file" class="form-control" name="thumbnail_image">
            </div>
          </div>
         
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="details"  name="description">{{old('description')}}</textarea>
            </div>
          </div>
          <br>
          <select class='form-control' name="publication_status" id="">
              <option value="1">published</option>
              <option value="0">unPublished</option>
          </select>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary btn-block" name="submit-btn">Post</button>
        </form>
      </div>
    </div>
  </div>
@endsection
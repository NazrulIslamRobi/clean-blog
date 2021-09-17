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
 
      
        <form  action="" method="post" enctype="multipart/form-data">
        @csrf

        
          <div class="control-group">
            <div class="form-group  controls">
              <label>Post Title</label>
              <input type="text" class="form-control" value="{{ $post->title }}" name="title">
             
            </div>
          </div>
          <br>
         
          <div class="control-group">
              <select class="form-control" name="category_id">
              <option value selected hidden>---SELECT YOUR CATEGORY---</option>
            
              <option value=""></option>
            
              </select>
            </div>
           
            <br>
    
         
          <div class="control-group">
            <div class="form-group  controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="details"  name="description">{{ $post->description }}</textarea>
            </div>
          </div>
          <br>
          <select class='form-control' name="publication_status" id="">
              <option value="1" @if($post->publication_status===1) selected @endif>published</option>
              <option value="0" @if($post->publication_status===0) selected @endif>unPublished</option>
          </select>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary btn-block" name="submit-btn">Update Post</button>
        </form>
      </div>
    </div>
  </div>
@endsection
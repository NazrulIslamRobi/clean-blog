@extends('layout.app')

@section('title','Home')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($articles as $article)
        <div class="post-preview">
          <a href="#">
            <h2 class="post-title">
             {{ $article->title }}
            </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{ $article->user->full_name }}</a>
            on {{$article->created_at->format("F d, h:s A")}} on {{ $article->category->name }}</p>
        </div>
        @endforeach
        <hr>
  

        <!-- Pager -->
 
      </div>
    </div>
  </div>

  <hr>
@endsection
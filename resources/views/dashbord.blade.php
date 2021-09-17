@extends('layout.app')
@section('title','dashbord')

@section('content')
<div class="container">
<h3>Dashbord</h3>
@php $user=auth()->user(); @endphp
{{optional($user)->email}}
<br>

@if($user->id===59)
<h4>Admin Notifications</h4>
<div class="well">
    @foreach($user->unreadnotifications as $notification)
        <ul>
            <li>{{$notification->data['full_name']}} has registered a account</li>
                {{$notification->markAsRead()}}
                
        </ul>
    @endforeach
</div>

@endif

<br>
<a href="{{route('show.category')}}" class="btn btn-danger">Add Category</a>
<a href="{{route('index.category')}}" class="btn btn-info">All Category</a> 
<a href="{{route('posts.create')}}" class="btn btn-dark">Write Post</a>
<a href="{{route('posts.index')}}" class="btn btn-info">View Post</a>
</div>
@endsection
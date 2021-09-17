<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        
       
        $data['articles']= cache('articles',function(){
         return  Post::with('category','user')->orderBy('created_at','desc')->take(20)->get();
        });
       
        return view('home',$data);
    }
}

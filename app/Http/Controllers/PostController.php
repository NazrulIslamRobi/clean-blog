<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts']= Post::with('category','user')->select('id','user_id','category_id','title','description','publication_status')->simplePaginate(10);
        return view('viewPost',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category']=Category::select('id','name')->where('status',1)->get();
       return view('writepost',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'title' => 'required|max:50',
            'category_id' => 'required',
            'description' => 'required'
            
        ]);

        $data=[
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category_id'),
            'title'=> $request->input('title'),
            'description' => $request->input('description'),
            'publication_status' => $request->input('publication_status')
            
        ];
        
        if(Post::create($data)){
            $notification= array(
                'messege' => 'post published successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('posts.index')->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['post']= Post::with('category','user')->select('id','user_id','category_id','title','description','publication_status')->find($id);
       return view('showPost',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post']=Post::with('category')->select('category_id','title','description','publication_status')->find($id);
        return view('editPost',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

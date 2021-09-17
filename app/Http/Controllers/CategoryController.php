<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
      
     $data['category']= Category::select('id','name','slug','status')->simplePaginate(10);
        return view('allCategory',$data);
        
    }

    public function showCategoryForm()
    {
        return view('addCategory');
    }

    public function storeCategory(Request $request)
    {
        $validatedData= $request->validate([

           'name' => 'required|unique:categories,name|min:6'
            
           ]);

           $data=[
               'name' => trim($request->input('name')),
               'slug' => Str::slug($request->input('name')),
               'status' => $request->input('status')
           ];

        if(Category::create($data)==true)
        {
                $notification= array(
                    'messege' => 'category successfully created',
                    'alert-type' => 'success'
                );
                return redirect()->route('index.category')->with($notification);
        }
        
    }

    public function detailsCategory($id)
    {
       $data['category']=Category::with('posts','posts.user')->select('id','name','slug','status','created_at')->find($id);
       
      return view('detailsCategory',$data);
        
    }

    public function editCategory($id)
    {
        $data['category']=Category::find($id);

        return view('editCategory',$data);
    }

    public function updateCategory(Request $request,$id)
    {
        $validatedData= $request->validate([
            'name'=> 'required|unique:categories,name,'.$id,
            'status'=> 'required'
        ]);
            $category=Category::find($id);
            $updateCategory=$category->update([
                'name'=> $request->input('name'),
                'slug'=> Str::slug($request->input('name')),
                'status' => $request->input('status')
            ]);
            $notification=array(
                'messege'=> 'category successfully updated',
                'alert-type'=> 'success'
            );
            if($updateCategory==true){
                return redirect()->route('index.category')->with($notification);
            }    
    }

    public function deleteCategory($id){
       $category= Category::find($id)->delete();
       $notification=array(
        'messege'=> 'Category has been deleted',
        'alert-type'=> 'info'
    );
       return redirect()->route('index.category')->with($notification);
      
       
    }

}

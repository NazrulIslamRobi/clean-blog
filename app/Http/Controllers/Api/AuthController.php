<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        return response()->json([
            'success'=> true,
            'message'=>'user read successfully',
            'data'=> User::all()
        ]);
    }
    public function store(Request $request)

    {
        
        $rules=[
            'full_name'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone_number'=> 'required|unique:users,phone_number',
            'password'=>'required|max:8'
         ];
         
         $validator= Validator::make($request->all(),$rules);
         if($validator->fails()){
             return response()->json($validator->getMessageBag()->all());
    
         }


       $user=User::create([
            
        'full_name'     => $request->input('full_name'),
        'email'         => strtolower($request->input('email')),
        'phone_number'  =>trim($request->input('phone_number')),
        'password'      => bcrypt($request->input('password')),
        'email_verification_token' => Str::random(32),
   
        ]);

       
            return response()->json([
                'success'=>true,
                'message'=>'user created successfully'
            
            ]);
      

    }

public function authenticate(Request $request)
{
      
      $credentials=$request->all();
   $token= auth()->attempt($credentials);
   if($token){
        return response()->json([
            "success"=>true,
            "message"=>"user logged in",
            "token"=>$token
        ]);
   }else{
    return response()->json([
        "error"=>true,
        "message"=>"invalid credentials",
    ]);
   }
  

}






}

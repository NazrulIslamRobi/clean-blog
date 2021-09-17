<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\verifyEmail;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('Registration.register');
    }

    public function processRegister(Request $request)
    {
       $validatedData= $request->validate([
           'full_name'      => 'required',
           'email'          => 'required|email|unique:users,email',
           'phone_number'   => 'required|max:13|min:11|unique:users,phone_number',
           'password'       => 'required|min:6|confirmed',
       ]);
       
        $user=User::create([
            
                'full_name'     => $request->input('full_name'),
                'email'         => strtolower($request->input('email')),
                'phone_number'  =>trim($request->input('phone_number')),
                'password'      => bcrypt($request->input('password')),
                'email_verification_token' => Str::random(32),
           
                ]);
                
       if($user){
        session()->flash('message','please verify your Email');
        session()->flash('type','success');
        return redirect()->route('login');
       }

    }

    public function showLoginForm()
    {
        return view('Registration.login');
    }

    public function processLogin(Request $request)
    {   
        $validatedData=$request->validate([
            'email' => 'required|email|',
            'password'=> 'required'
        ]);
      $credentials= $request->except('_token');
      $credentials['email_verified']= 1;

      $verify=auth()->attempt($credentials);
      if($verify===true){
      
          $notification=array(
              'messege'=> 'you are logged in',
              'type'=>'success'
          );
        $user=  auth()->user();
        $user->update([
            'last_login'=> Carbon::now(),
        ]);

          

          return redirect()->route('dashbord')->with($notification);
      }else{
          session()->flash('message','invalid credentials or Email is not verified');
          session()->flash('type','danger');
          return redirect()->back();
      }
      
    }

public function logout()
{
    auth()->logout();
    return redirect()->route('login');
}

public function verify($token)
{

$user=User::where('email_verification_token',$token)->first();

if($user===null){
    
    session()->flash('message','invalid token');
    session()->flash('type','danger');
    return redirect()->route('register');
}

$user->update([
    'email_verified'=>1,
    'email_verified_at'=>Carbon::now(),
    'email_verification_token'=> ' ',

]);

auth()->login($user);
$notification=array(
    'messege'=> 'you are logged in',
    'type'=>'success'
);
return redirect()->route('dashbord')->with($notification);


}




}

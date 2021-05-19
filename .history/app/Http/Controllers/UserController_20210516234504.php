<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(UserRequest $request){
        Users::create([
            "fname" => $request->input('fname'),
            "lname" => $request->input('lname'),
            "email" => $request->input('email'),
            "fname" => $request->input('fname'),
        ]);
        // $user = new Users();
        // $user->fname = $request->input('fname');
        // $user->lname = $request->input('lname');
        // $user->email = $request->input('email');
        // $user->password = Hash::make($request->input('password'));
        // $user->save();
        // return redirect()->route('register-page')->with('success','The user has already registered');
    }

    public function login(Request $request){
         $request->validate([
             'email' => 'required|email',
             'password' => 'required|min:4|max:50'
         ]);
      
         $userinfo = Users::where('email','=',$request->email)->first();

         if(!$userinfo){
             return back()->with('fail','We do not recognize your email');
         }else{
              if(Hash::check($request->password,$userinfo->password)){
                  $request->session()->put('loggedUser',$userinfo->id);
                  return redirect('login/userlogined');
              }else{
                  return back()->with('fail','Incorrect Password');
              }
         } 
    }

    public function dashboard(){
        $data = ['LoggedUserinfo'=>Users::where('id','=',session('loggedUser'))->first()];
        return view('user_loggin',$data);
    }
}

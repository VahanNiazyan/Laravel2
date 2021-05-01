<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Users;

class UserController extends Controller
{
    public function register(UserRequest $request){
        $user = new Users();
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return redirect()->route('register-page')->with('success','success alredi add data');
    }
}

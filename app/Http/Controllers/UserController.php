<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //////////////////////////  --  register  --///////////////////////////////
    public function register(UserRequest $request){
       $user = Users::create([
            "level_id" => $request->input('level_id'),
            "fname" => $request->input('fname'),
            "lname" => $request->input('lname'),
            "email" => $request->input('email'),
            "password" => Hash::make($request->input('password'))
        ]);

//       $user = User::create($request->validated());

        // $user = new Users();
        // $user->fname = $request->input('fname');
        // $user->lname = $request->input('lname');
        // $user->email = $request->input('email');
        // $user->password = Hash::make($request->input('password'));
        // $user->save();
        return response()->json($user, 201);
//         return redirect()->route('register-page')->with('success','The user has already registered');
    }
    //////////////////////////  --  index  --///////////////////////////////
   public function index(){
        return view('user.index',[
            'users' => Users::get()
        ]);
   }
    //////////////////////////  --  create  --///////////////////////////////
    public function create(){
        return view('user.create',[
            'user' => []
        ]);
    }
    //////////////////////////  --  store  --///////////////////////////////
    public function store(Request $request)
    {
        $user = Users::create($request->all());
        $user->animal()->create($request->only('name_animal'));

        return redirect()->route('user.show',$user);
    }
    //////////////////////////  --  show  --///////////////////////////////
   public function show()
   {
       return view('user.show', ['users' => Users::get()]);

   }
    //////////////////////////  --  delete  --///////////////////////////////
    public function delete($id){
        $user = Users::find($id)->delete();
        return redirect()->route('index')->with('success' , 'succesfuly deleted' );
    }
    //////////////////////////  --  delete  --///////////////////////////////



    public function get_user_relation(){
        dd(Users::with('profile')->find(2));
    }
    public function get_level_relation(){
        dd(Users::with('level')->find(2));
    }


    //////////////////////////  --  login  --///////////////////////////////
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
    //////////////////////////  --  login  --///////////////////////////////

    //////////////////////////  --  dashboard  --///////////////////////////////
    public function dashboard(){
        $data = ['LoggedUserinfo'=>Users::where('id','=',session('loggedUser'))->first()];
        return view('user_loggin',$data);
    }
}
    //////////////////////////  --  dashboard  --///////////////////////////////

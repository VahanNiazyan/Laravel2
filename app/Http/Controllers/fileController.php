<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\Models\File;


class fileController extends Controller
{

    public function file_upload(Request $req){

    
        $req->validate([
            'fname' => 'required',
            'file' => 'required|mimes:jpg,png,jpeg'
        ]);

    //  $req->file->store('public');
     
    $file = new File();
    $name = $req->file->getClientOriginalName();
    if($req->file()){
        $file_upload = time() . '_' . $name;
        $file_name = $req->file('file')->storeAs('uploads',$file_upload,'public');
        $file->fname = $req->fname;
        $file->path = '/storage/' . $file_name;
        $file->save();

        return back()
        ->with('success','File has been uploaded.');
        }
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index(){
        $paginator = $this->blogPostRepository->getAllWithPaginate();
        return view('index', compact('paginator'));
    }

}

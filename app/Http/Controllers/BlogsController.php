<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //

    public function index(){
      $blogs = Blogs::all();
      return view('blog.index', compact('blogs'));

    }
}

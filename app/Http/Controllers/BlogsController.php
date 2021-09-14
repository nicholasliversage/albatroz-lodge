<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //

    public function index(){
      $blogs = Blogs::all();
      return view('blog.index', compact('blogs'));

    }

    public function show($id){
        $blog = Blogs::find($id);
       
        $blogs = Blogs::where('id','!=',$id)->get();
        return view('blog.show', compact('blog','blogs'));
  
      }

      public function storeComment(Request $request,$id){
        $this->validate($request, [
            'comment_content' => 'required',
        ]);

        $blog = Blogs::find($id);

            $comment = new Comments();
             $comment->user_id = auth()->id();
             $comment->description = $request->get('comment_content');
            $blog->comments()->save($comment);
            
        return redirect()->back();
      }

      public function admin_index(){
        $blogs = Blogs::all();
        return view('admin.pages.blogs', compact('blogs'));
      }
  }


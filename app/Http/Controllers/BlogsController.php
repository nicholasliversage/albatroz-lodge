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

        $blog = Blogs::findOrFail($id);

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

      public function admin_remove($id){
        $blog = Blogs::findOrFail($id)->delete();
        return back();
      }

      public function admin_add(Request $request){
        $this->validate($request, [
          'name' => 'required',
          'description' => 'required',
          'subject' => 'required',
      ]); 
      
      $image1 = time().'.'.$request->image1->extension();  
      $request->image1->move(public_path('images'), $image1);

      $blog = new Blogs();
      $blog->title = $request->get('name');
      $blog->subject = $request->get('subject');
      $blog->description = $request->get('description');
      $blog->img1 = 'images/'.$image1;;
     
      if($request->has('image2')){
        $image1 = time().'.'.$request->image2->extension();  
        $request->image1->move(public_path('images'), $image1);
        $blog->img2 = 'images/'.$image1;;
      }
      else
      $blog->img2 = null;

      if($request->has('image3')){
        $image1 = time().'.'.$request->image2->extension();  
        $request->image1->move(public_path('images'), $image1);
        $blog->img3 = 'images/'.$image1;;
      }
      else
      $blog->img3 = null;

      $blog->save();

        return back();
      }

      public function admin_edit(Request $request,$id){

        $result = Blogs::findOrFail($id)
        ->update([
           'title' => $request->get('name'),
           'description' => $request->get('description'),
           'subject' => $request->get('subject')
       ]);

        if($request->hasFile('image1')){
           if ($request->file('image1')->isValid())
           {
               $image1 = time().'.'.$request->image1->extension();  
               $request->image1->move(public_path('images'), $image1);
              $result= Blogs::findOrFail($id)
              ->update([
               'img1' => 'images/'.$image1
              ]);
           }
        }

        if($request->hasFile('image2')){
           if ($request->file('image2')->isValid())
           {
               $image2 = time().'.'.$request->image2->extension();  
               $request->image2->move(public_path('images'), $image2);
              $result= Blogs::findOrFail($id)
              ->update([
               'img2' => 'images/'.$image2
              ]);
           }
        }

        if($request->hasFile('image3')){
           if ($request->file('image3')->isValid())
           {
               $image3 = time().'.'.$request->image3->extension();  
               $request->image3->move(public_path('images'), $image3);
              $result= Blogs::findOrFail($id)
              ->update([
               'img3' => 'images/'.$image3
              ]);
           }
        }
        
        return back();
      }
  }


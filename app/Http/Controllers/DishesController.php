<?php

namespace App\Http\Controllers;
use App\Models\Dishes;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    //
    public function index(){

       $dishes = Dishes::all();

       return view('restaurant.index', compact('dishes'));
    }

    public function admin_index(){

        $dishes = Dishes::all();
 
        return view('admin.pages.dishes', compact('dishes'));
     }

     public function admin_remove($id){
      $dishes = Dishes::findOrFail($id)->delete();
      return back();
   }

   public function admin_add(Request $request){
      $this->validate($request, [
         'name' => 'required',
         'description' => 'required',
         'price' => 'required',
         'category' => 'required',
         'special' => 'required',
     ]); 
     
     $imageDish = time().'.'.$request->imgDish->extension();  
     $request->imgDish->move(public_path('images'), $imageDish);


     $dish = new Dishes();
     $dish->name = $request->get('name');
     $dish->description = $request->get('description');
     $dish->price = $request->get('price');
     $dish->category = $request->get('category');
     $dish->imgDish =  'images/'.$imageDish;
     if($request->get('special') == 1)
     $dish->special = true;
     else
     $dish->special = false;

     $dish->save();

      return back();
   }

   public function admin_edit(Request $request,$id){

      
      

      $result = Dishes::findOrFail($id)
      ->update([
         'name' => $request->get('name'),
         'description' => $request->get('description'),
         'price' => $request->get('price'),
         'category' => $request->get('category'),
         'special' => $request->get('special')
         
     ]);

     if($request->hasFile('imgDish')){
      if ($request->file('imgDish')->isValid())
      {
         $imageDish = time().'.'.$request->imgDish->extension();  
         $request->imgDish->move(public_path('images'), $imageDish);
         $result= Dishes::findOrFail($id)
         ->update([
            'imgDish' => 'images/'.$imageDish
         ]);
      }
      
   }

      return back();
   }
}

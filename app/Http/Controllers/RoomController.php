<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    //

    public function index(){
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function show($id){
        $room = Room::findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    public function admin_index(){
        $rooms = Room::all();
        return view('admin.pages.rooms', compact('rooms'));
    }

    public function admin_remove($id){
        $room = Room::findOrFail($id)->delete();
     return back();
    }

    public function admin_add(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'rooms' => 'required',
            'persons' => 'required',
            'beds' => 'required', 
            'view' => 'required',
        ]); 
        
        $imageRoom = time().'.'.$request->imgRoom->extension();  
        $request->imgRoom->move(public_path('images'), $imageRoom);

        $image1 = time().'.'.$request->image1->extension();  
        $request->image1->move(public_path('images'), $image1);

        $room = new Room();
        $room->name = $request->get('name');
        $room->rooms = $request->get('rooms');
        $room->description = $request->get('description');
        $room->price = $request->get('price');
        $room->persons = $request->get('persons');
        $room->bed = $request->get('beds');
        $room->imgRoom =  'images/'.$imageRoom;
        $room->img1 = 'images/'.$image1;;

        if($request->has('image2')){
            $image1 = time().'.'.$request->image2->extension();  
            $request->image2->move(public_path('images'), $image1);
            $room->img2 = 'images/'.$image1;;
        }
        else
        $room->img2 = null;

        if($request->has('image3')){
            $image1 = time().'.'.$request->image3->extension();  
            $request->image3->move(public_path('images'), $image1);
            $room->img3 = 'images/'.$image1;;
        }
        else
        $room->img3 = null;

        if($request->get('view') == 1)
        $room->view = true;
        else
        $room->view = false;

        $room->save();

        return back();
    }

    public function admin_edit(Request $request,$id){

         $result = Room::findOrFail($id)
         ->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'rooms' => $request->get('rooms'),
            'persons' => $request->get('persons'),
            'bed' => $request->get('beds'),
            'view' => $request->get('view')
        ]);


        if($request->hasFile('imgRoom')){
            if ($request->file('imgRoom')->isValid())
            {
                $imageRoom = time().'.'.$request->imgRoom->extension();  
                $request->imgRoom->move(public_path('images'), $imageRoom);
               $result= Room::findOrFail($id)
               ->update([
                'imgRoom' => 'images/'.$imageRoom
               ]);
            }
         }

         if($request->hasFile('image1')){
            if ($request->file('image1')->isValid())
            {
                $image1 = time().'.'.$request->image1->extension();  
                $request->image1->move(public_path('images'), $image1);
               $result= Room::findOrFail($id)
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
               $result= Room::findOrFail($id)
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
               $result= Room::findOrFail($id)
               ->update([
                'img3' => 'images/'.$image3
               ]);
            }
         }


        return back();
    }
}

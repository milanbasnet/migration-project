<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        return view('admin.index');
    }

    public function homeIndex(){
        $homeData=Home::all();
        return view('admin.home.index', compact('homeData'));
    }

    public function storeHome(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png'
        ]);

        $name=$request->image->getClientOriginalExtension();
        $generate=hexdec(uniqid());
        $imagename=$generate.'.'.$name;
        $request->image->move(public_path('images/background'),$imagename);

        $homeStore= new Home();
        $homeStore->title=$request->title;
        $homeStore->description=$request->description;
        $homeStore->image=$imagename;
        $homeStore->save();

        return back()->with('success', 'Home section created successfully');
    }

    public function editHome($id){
        $edits=Home::find($id);
        return view('admin.home.edit', compact('edits'));
    }
     
    public function updateHome(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',  // no validation is required for image here 
            'description' => 'required',  
        ]);
        $existImage = $request->oldImage;   //existing image as value is taken from input field of edit page
        $upLocation = 'images/background/' . $existImage;  //image path and image file

        if ($request->image) {    //if else is used to edit only brandName if brand image is not selected 
            // that remains same as before and only brandName is updated by else conditon 
            $name = $request->image->getClientOriginalExtension();
            $generate=hexdec(uniqid());
            $imagename = $generate . '.' . $name;
            $request->image->move(public_path('images/background'), $imagename);

            unlink($upLocation);   //unlink old image 

            $updatehome = Home::find($id);
            $updatehome->title = $request->title;
            $updatehome->description = $request->description;
            $updatehome->image= $imagename;
            $updatehome->save();

            return back()->with('success', 'Home section updated successfully');
        } else {
            $updatehome = Home::find($id);
            $updatehome->title = $request->title;
            $updatehome->description = $request->description;
            $updatehome->save();

            return back()->with('success', 'Home section updated successfully');
        }
    }

    public function deleteHome($id){
        //below code will delete from database but not delete image from folder
        $deleteHome=Home::find($id);
        $deleteImage='images/background/' . ($deleteHome->image);
        unlink($deleteImage);
        $deleteHome->delete();
        return back()->with('success', 'Home is deleted successfully');
    }
}

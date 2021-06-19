<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutIndex(){
        $aboutData=About::all();
        return view('admin.about.index', compact('aboutData'));
    }

    public function abouStore(Request $request){
        $this->validate($request, [
            'content'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png'
        ]);

        $name=$request->image->getClientOriginalExtension();
        $generate=hexdec(uniqid());
        $imagename=$generate.'.'.$name;
        $request->image->move(public_path('images/about'),$imagename);

        $aboutStore= new About();
        $aboutStore->content=$request->content;
        $aboutStore->image=$imagename;
        $aboutStore->save();

        return back()->with('success', 'About section created successfully');
    }
    public function editAbout($id){
        $edits=About::find($id);
        return view('admin.about.edit', compact('edits'));
    }
     
    public function updateAbout(Request $request, $id){
        $this->validate($request, [
            'content' => 'required',  
        ]);
        $existImage = $request->oldImage;   //existing image as value is taken from input field of edit page
        $upLocation = 'images/about/' . $existImage;  //image path and image file

        if ($request->image) {    //if else is used to edit only brandName if brand image is not selected 
            // that remains same as before and only brandName is updated by else conditon 
            $name = $request->image->getClientOriginalExtension();
            $generate=hexdec(uniqid());
            $imagename = $generate . '.' . $name;
            $request->image->move(public_path('images/about'), $imagename);

            unlink($upLocation);   //unlink old image 

            $updateAbout = About::find($id);
            $updateAbout->content = $request->content;
            $updateAbout->image= $imagename;
            $updateAbout->save();

            return back()->with('success', 'About section updated successfully');
        } else {
            $updateAbout = About::find($id);
            $updateAbout->title = $request->title;
            $updateAbout->description = $request->description;
            $updateAbout->save();

            return back()->with('success', 'About section updated successfully');
        }
    }

    public function deleteAbout($id){
        //below code will delete from database but not delete image from folder
        $deleteAbout=About::find($id);
        $deleteImage='images/about/' . ($deleteAbout->image);
        unlink($deleteImage);
        $deleteAbout->delete();
        return back()->with('success', 'About is deleted successfully');
    }

    public function moreAbout(){
        return view('front.nav.moreabout');
    }
}

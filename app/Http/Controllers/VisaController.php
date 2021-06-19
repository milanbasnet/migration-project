<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function show(){
        $visaData=Visa::all();
        return view('admin.visas.index', compact('visaData'));
    }

    public function visaStore(Request $request){
        $this->validate($request, [
            'box'=>'required',
            'title'=>'required',
            'content'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png'
        ]);

        $name=$request->image->getClientOriginalExtension();
        $generate=hexdec(uniqid());
        $imagename=$generate.'.'.$name;
        $request->image->move(public_path('images/visas'),$imagename);

        $store= new Visa();
        $store->boxnumber=$request->box;
        $store->title=$request->title;
        $store->content=$request->content;
        $store->image=$imagename;
        $store->save();

        return back()->with('success', 'Visa section is added successfully');
    }
    public function editVisa($id){
        $edits=Visa::find($id);
        return view('admin.visas.edit', compact('edits'));
    }
    public function updateVisa(Request $request, $id){
        $this->validate($request,[
            "box"=>"required",
            "title"=>"required",
            "content"=>"required",
        ]);

        $existImage=$request->oldImage;
        $upLocation='images/visas/'.$existImage;

        if ($request->image) {
            $name=$request->image->getClientOriginalExtension();
            $generate=hexdec(uniqid());
            $imagename=$generate.'.'.$name;
            $request->image->move(public_path('images/visas'), $imagename);

            unlink($upLocation);

            $store=Visa::find($id);
            $store->boxnumber=$request->box;
            $store->title=$request->title;
            $store->content=$request->content;
            $store->image=$imagename;
            $store->save();

            return back()->with('success', 'Visa section is updated successfully');
        }
        else{
            $store=Visa::find($id);
            $store->boxnumber=$request->box;
            $store->title=$request->title;
            $store->content=$request->content;
            $store->save();

            return back()->with('success', 'Visa section is updated successfully');
        }
    }
    public function deleteVisa($id){
        $delVisa=Visa::find($id);
        $folderImage='images/visas/'.($delVisa->image);
        unlink($folderImage);
        $delVisa->delete();
        return back()->with('success', 'Visa is deleted successfully');

    }
}

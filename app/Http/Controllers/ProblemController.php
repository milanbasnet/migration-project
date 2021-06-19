<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function show(){
        $problemData=Problem::all();
        return view('admin.problem.index', compact('problemData'));
    }

    public function storeProblem(Request $request){
        $this->validate($request,[
            'content'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png'
        ]);

        $name=$request->image->getClientOriginalExtension();
        $generate=hexdec(uniqid());
        $imagename=$generate.'.'.$name;
        $request->image->move(public_path('images/visaProblem'),$imagename);

        $storeProblem=new Problem();
        $storeProblem->content=$request->content;
        $storeProblem->image=$imagename;
        $storeProblem->save();

        return back()->with('success', 'Problem section created successfully');
    }

    public function editProblem($id){
        $edits=Problem::find($id);
        return view('admin.problem.edit', compact('edits'));
    }

    public function updateProblem(Request $request, $id){
        $this->validate($request,[
            'content'=>'required'
        ]);

        $existImage=$request->oldImage;
        $uplocation='images/visaProbelm/'.$existImage;

        if ($request->image) {
            $name=$request->image->getClientOriginalExtension();
            $generate=hexdec(uniqid());
            $imagename=$generate.'.'.$name;
            $request->image->move(public_path('images/visaProbelm'), $imagename);

            unlink($uplocation);

            $storeProblem=Problem::find($id);
            $storeProblem->content=$request->content;
            $storeProblem->image=$imagename;
            $storeProblem->save();

            return back()->with('success', 'Problem section created successfully');
        }
        else{
            $storeProblem=Problem::find($id);
            $storeProblem->content=$request->content;
            $storeProblem->save();

            return back()->with('success', 'Problem section created successfully');
        }
    }

    public function deleteProblem($id){
        $delete=Problem::find($id);
        $delFolder='images/visaProbelm/'.($delete->image);
        unlink($delFolder);
        $delete->delete();

        return back()->with('success', 'Visa Problem is deleted successfully');
    }
}

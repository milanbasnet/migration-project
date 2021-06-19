<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show(){
        $newsData=News::all();
        return view('admin.news.index', compact('newsData'));
    }

    public function storeNews(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png'
        ]);

        $name=$request->image->getClientOriginalExtension();
        $generate=hexdec(uniqid());
        $imagename=$generate.'.'.$name;
        $request->image->move(public_path('images/news'),$imagename);

        $storeNews=new News();
        $storeNews->title=$request->title;
        $storeNews->content=$request->content;
        $storeNews->image=$imagename;
        $storeNews->save();

        return back()->with('success', 'News created successfully');
    }

    public function editNews($id){
        $edits=News::find($id);
        return view('admin.news.edit', compact('edits'));
    }

    public function updateNews(Request $request, $id){
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
        ]);

        $existImage=$request->oldImage;
        $uplocation='images/news/'.$existImage;

        if ($request->image) {
            $name=$request->image->getClientOriginalExtension();
            $generate=hexdec(uniqid());
            $imagename=$generate.'.'.$name;
            $request->image->move(public_path('images/news'), $imagename);

            unlink($uplocation);

            $storeNews=News::find($id);
            $storeNews->title=$request->title;
            $storeNews->content=$request->content;
            $storeNews->image=$imagename;
            $storeNews->save();

            return back()->with('success', 'News created successfully');
        }
        else{
            $storeNews=News::find($id);
            $storeNews->title=$request->title;
            $storeNews->content=$request->content;
            $storeNews->save();

            return back()->with('success', 'News created successfully');
        }
    }

    public function deleteNews($id){
        $delete=News::find($id);
        $delFolder='images/news/'.($delete->image);
        unlink($delFolder);
        $delete->delete();

        return back()->with('success', 'News is deleted successfully');
    }
}

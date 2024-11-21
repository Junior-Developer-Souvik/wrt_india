<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;

class WhyChooseUSController extends Controller
{
    public function index(Request $request){
        $search = $request->input('table_search');

        $whyChooseus = WhyChooseUs::latest()
                                   ->when($search,function($query) use($search){
                                       $query->where('title','LIKE','%'.$search.'%');
                                   })
                                   ->get();
        return view('admin.why_choose_us.index',compact('whyChooseus'));
    }

    public function create(){
        return view('admin.why_choose_us.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'  // Optional image validation
        ]);

        $whyChooseus = new WhyChooseUs();
        $whyChooseus->title = $request->title;
        $whyChooseus->description = $request->description;
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand().'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/why_choose_us');
            $file->move($imgPath,$fileName);
            $whyChooseus->image = 'uploads/why_choose_us/'.$fileName;
        }
        $whyChooseus->save();
        return redirect()->route('why_choose_us.list.all')->with('success','Why Choose Us Created Successfully');        
    }

    public function edit($id){
        $whyChooseus = WhyChooseUs::findOrFail($id);
        return view('admin.why_choose_us.edit',compact('whyChooseus'));
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'  // Optional image validation
        ]);
        $whyChooseus = WhyChooseUs::findOrFail($request->id);
        $whyChooseus->title = $request->title;
        $whyChooseus->description = $request->description;
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand().'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/why_choose_us');
            $file->move($imgPath,$fileName);
            $whyChooseus->image = 'uploads/why_choose_us/'.$fileName;
        }
        $whyChooseus->save();
        return redirect()->route('why_choose_us.list.all')->with('success','Why Choose Us Updated Successfully');        

    }

    public function delete($id){
        $whyChooseus = WhyChooseUs::findOrFail($id);
        $whyChooseus->delete();
        return redirect()->route('why_choose_us.list.all')->with('success','Why Choose Us Deleted Successfully');        
    }




}

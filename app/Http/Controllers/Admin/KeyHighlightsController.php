<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KeyHighlights;


class KeyHighlightsController extends Controller
{
    public function index(){
        $KeyHighlights = KeyHighlights::where('deleted_at',1)->paginate(20);
        return view('admin.key_highlights.index',compact('KeyHighlights'));
    }

    public function create(){
        return view('admin.key_highlights.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            // Custom messages for the 'title' field
            'title.required' => 'The title field is mandatory.',
            'title.string' => 'The title must be a valid string.',
            'title.max' => 'The title must not exceed 255 characters.',
        
            // Custom messages for the 'desc' field
            'desc.required' => 'Please provide a description.',
            'desc.string' => 'The description must be valid text.',
        
            // Custom messages for the 'image' field
            'image.required' => 'An image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif, or svg.',
            'image.max' => 'The image size must not exceed 2MB.',
        ]);
        
        $KeyHighlights = new KeyHighlights();
        $KeyHighlights->title = $request->title ?? '';
        $KeyHighlights->desc = $request->desc ?? '';
        
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/key_highlights');
            $file->move($imgPath,$fileName);
            $KeyHighlights->image = "uploads/key_highlights/".$fileName;
        }

        $KeyHighlights->save();
        return redirect()->route('key_highlights.list.all')->with('success','Key Highlights Created Successfully');
    }

    public function edit($id){
        $KeyHighlights = KeyHighlights::findOrFail($id);
        return view('admin.key_highlights.edit',compact('KeyHighlights'));
    }

    public function update(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            // Custom messages for the 'title' field
            'title.required' => 'The title field is mandatory.',
            'title.string' => 'The title must be a valid string.',
            'title.max' => 'The title must not exceed 255 characters.',
        
            // Custom messages for the 'desc' field
            'desc.required' => 'Please provide a description.',
            'desc.string' => 'The description must be valid text.',
        
            // Custom messages for the 'image' field
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif, or svg.',
            'image.max' => 'The image size must not exceed 2MB.',
        ]);

        $KeyHighlights = KeyHighlights::findOrFail($request->key_highlights_id);
        $KeyHighlights->title = $request->title ?? '';
        $KeyHighlights->desc = $request->desc ?? '';
        
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/key_highlights');
            $file->move($imgPath,$fileName);
            $KeyHighlights->image = "uploads/key_highlights/".$fileName;
        }

        $KeyHighlights->save();
        return redirect()->route('key_highlights.list.all')->with('success','Key Highlights Updated Successfully');
    }

    public function delete($id){  
        $KeyHighlights = KeyHighlights::findOrFail($id);
        $KeyHighlights->deleted_at = ($KeyHighlights->deleted_at == 1)? 0:1;
        $KeyHighlights->save();
        return redirect()->back()->with('success',"Key Highlights Deleted Successfully");
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;


class AboutUSController extends Controller
{
    public function index(){
        $about_us = AboutUs::where('deleted_at',1)->paginate(20);
         return view('admin.about_us.index',compact('about_us'));
    }

    public function create(){
        return view('admin.about_us.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title1' => 'required|string|max:255',
            'desc1' => 'required|string',
            'title2' => 'required|string|max:255',
            'desc2' => 'required|string',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_title' => 'required|string|max:255',
            'image_desc' => 'required|string',
        ], [
            'title1.required' => 'The first title is required.',
            'title1.max' => 'The first title must not exceed 255 characters.',
            'desc1.required' => 'The first description is required.',
            'title2.required' => 'The second title is required.',
            'title2.max' => 'The second title must not exceed 255 characters.',
            'desc2.required' => 'The second description is required.',
            'image1.required' => 'The first image is required.',
            'image1.image' => 'The first file must be a valid image.',
            'image1.mimes' => 'The first image must be one of the following formats: jpeg, png, jpg, gif, svg.',
            'image1.max' => 'The first image size must not exceed 2MB.',
            'image2.required' => 'The second image is required.',
            'image2.image' => 'The second file must be a valid image.',
            'image2.mimes' => 'The second image must be one of the following formats: jpeg, png, jpg, gif, svg.',
            'image2.max' => 'The second image size must not exceed 2MB.',
            'image_title.required' => 'The image title is required.',
            'image_title.max' => 'The image title must not exceed 255 characters.',
            'image_desc.required' => 'The image description is required.',
        ]);
        

        $about_us = new AboutUs();
        $about_us->title1 = $request->title1 ?? '';
        $about_us->desc1 = $request->desc1 ?? '';
        $about_us->title2 = $request->title2 ?? '';
        $about_us->desc2 = $request->desc2 ?? '';
        $about_us->image_title = $request->image_title ?? '';
        $about_us->image_desc = $request->image_desc ?? '';
       
        if($request->image1){
            $file = $request->file('image1');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/about_us');
            $file->move($imgPath,$fileName);
            $about_us->image1 = "uploads/about_us/".$fileName;
        }
        if($request->image2){
            $file = $request->file('image2');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/about_us');
            $file->move($imgPath,$fileName);
            $about_us->image2 = "uploads/about_us/".$fileName;
        }

        $about_us->save();
        return redirect()->route('about_us.list.all')->with('success','About Us Created Successfully');
    }

    public function edit($id){
        $about_us = AboutUs::findOrFail($id);
        return view('admin.about_us.edit',compact('about_us'));
    }

    public function update(Request $request){
        // dd($request->all());    
        $request->validate([
            'title1' => 'required|string|max:255',
            'desc1' => 'required|string',
            'title2' => 'required|string|max:255',
            'desc2' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_title' => 'required|string|max:255',
            'image_desc' => 'required|string',
        ], [
            'title1.required' => 'Please provide the first title.',
            'title1.max' => 'The first title should not exceed 255 characters.',
            'desc1.required' => 'Please enter the description for the first title.',
            'title2.required' => 'The second title is mandatory.',
            'title2.max' => 'The second title should not exceed 255 characters.',
            'desc2.required' => 'Please provide the description for the second title.',
            'image1.image' => 'The first image must be in a valid image format.',
            'image1.mimes' => 'The first image must be one of the following types: jpeg, png, jpg, gif, svg.',
            'image1.max' => 'The size of the first image must not exceed 2MB.',
            'image2.image' => 'The second image must be in a valid image format.',
            'image2.mimes' => 'The second image must be one of the following types: jpeg, png, jpg, gif, svg.',
            'image2.max' => 'The size of the second image must not exceed 2MB.',
            'image_title.required' => 'Please provide a title for the image.',
            'image_title.max' => 'The image title should not exceed 255 characters.',
            'image_desc.required' => 'Please provide a description for the image.',
        ]);
        

        $about_us = AboutUs::findOrFail($request->about_us_id);
        $about_us->title1 = $request->title1 ?? '';
        $about_us->desc1 = $request->desc1 ?? '';
        $about_us->title2 = $request->title2 ?? '';
        $about_us->desc2 = $request->desc2 ?? '';
        $about_us->image_title = $request->image_title ?? '';
        $about_us->image_desc = $request->image_desc ?? '';
       
        if($request->image1){
            $file = $request->file('image1');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/about_us');
            $file->move($imgPath,$fileName);
            $about_us->image1 = "uploads/about_us/".$fileName;
        }

        if($request->image2){
            $file = $request->file('image2');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/about_us');
            $file->move($imgPath,$fileName);
            $about_us->image2 = "uploads/about_us/".$fileName;
        }

        $about_us->save();
        return redirect()->route('about_us.list.all')->with('success','About Us Updated Successfully');
    }

    public function delete($id){  
        $about_us = AboutUs::findOrFail($id);
        $about_us->deleted_at = ($about_us->deleted_at == 1)? 0:1;
        $about_us->save();
        return redirect()->back()->with('success',"About Us Deleted Successfully");
    }

    
        
              
}

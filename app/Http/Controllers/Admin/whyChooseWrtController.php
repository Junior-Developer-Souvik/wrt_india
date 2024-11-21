<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseWrt;


class whyChooseWrtController extends Controller
{
    public function index(){
        $WhyChooseWrt = WhyChooseWrt::where('deleted_at',1)->paginate(20);
        return view('admin.why_choose_wrt.index',compact('WhyChooseWrt'));
    }

    public function create(){
        return view('admin.why_choose_wrt.create');
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

        $WhyChooseWrt = new WhyChooseWrt();
        $WhyChooseWrt->title = $request->title ?? '';
        $WhyChooseWrt->slug = slugGenerate($request->title,'why_choose_wrt') ?? '';
        $WhyChooseWrt->desc = $request->desc ?? '';
        
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/why_choose_wrt');
            $file->move($imgPath,$fileName);
            $WhyChooseWrt->image = "uploads/why_choose_wrt/".$fileName;
        }

        $WhyChooseWrt->save();
        return redirect()->route('why_choose_wrt.list.all')->with('success','Why Choose Wrt Created Successfully');
    }

    public function edit($id){
        $WhyChooseWrt = WhyChooseWrt::findOrFail($id);
        return view('admin.why_choose_wrt.edit',compact('WhyChooseWrt'));
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

        $WhyChooseWrt = WhyChooseWrt::findOrFail($request->why_choose_wrt_id);
        $WhyChooseWrt->title = $request->title ?? '';
        $WhyChooseWrt->desc = $request->desc ?? '';
        
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/why_choose_wrt');
            $file->move($imgPath,$fileName);
            $WhyChooseWrt->image = "uploads/why_choose_wrt/".$fileName;
        }

        $WhyChooseWrt->save();
        return redirect()->route('why_choose_wrt.list.all')->with('success','Why Choose Wrt Updated Successfully');
    }


    public function delete($id){  
        $WhyChooseWrt = WhyChooseWrt::findOrFail($id);
        $WhyChooseWrt->deleted_at = ($WhyChooseWrt->deleted_at == 1)? 0:1;
        $WhyChooseWrt->save();
        return redirect()->back()->with('success',"Why Choose Wrt Deleted Successfully");
    }
}

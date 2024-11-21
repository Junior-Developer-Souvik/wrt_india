<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class WebsiteSettingController extends Controller
{
    public function WebsiteSittengIndex(){
        $data = Setting::get();
        return view('admin.wesite_setting.index',compact('data'));
    }

    public function WebsiteSittengUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'official_contact_number_1' => 'required|integer|digits:10',
            'official_contact_number_2' => 'nullable|integer|digits:10',
            'official_email' => 'required|email|min:5|max:255',
            'website' => 'required|min:5|max:255',
            'full_company_name' => 'required|string|min:1|max:255',
            'pretty_company_name' => 'required|string|min:1|max:255',
            'company_logo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'fav_icon' => 'mimes:jpg,jpeg,png,gif|max:1024',
            'short_company_description' => 'required|string|min:5|max:1000',
            'full_company_address' => 'required|string|min:5|max:1000',
            'google_map_address_link' => 'required|string|min:5',
        ],[
            'official_contact_number_1.required' => 'The primary contact number is required.',
            'official_contact_number_1.integer' => 'The primary contact number must be a valid number.',
            'official_contact_number_1.digits' => 'The primary contact number must be exactly 10 digits.',
            
            'official_contact_number_2.integer' => 'The secondary contact number must be a valid number.',
            'official_contact_number_2.digits' => 'The secondary contact number must be exactly 10 digits.',
        
            'official_email.required' => 'The official email address is required.',
            'official_email.email' => 'The official email address must be a valid email.',
            'official_email.min' => 'The official email must be at least 5 characters long.',
            'official_email.max' => 'The official email must not exceed 255 characters.',
        
            'website.required' => 'The website is required.',
            'website.min' => 'The website must be at least 5 characters long.',
            'website.max' => 'The website must not exceed 255 characters.',
        
            'full_company_name.required' => 'The full company name is required.',
            'full_company_name.string' => 'The full company name must be a valid string.',
            'full_company_name.min' => 'The full company name must be at least 1 character long.',
            'full_company_name.max' => 'The full company name must not exceed 255 characters.',
        
            'pretty_company_name.required' => 'The pretty company name is required.',
            'pretty_company_name.string' => 'The pretty company name must be a valid string.',
            'pretty_company_name.min' => 'The pretty company name must be at least 1 character long.',
            'pretty_company_name.max' => 'The pretty company name must not exceed 255 characters.',
        
            'company_logo.mimes' => 'The company logo must be a file of type: jpg, jpeg, png, gif.',
            'company_logo.max' => 'The company logo must not exceed 2 MB.',
        
            'fav_icon.mimes' => 'The favicon must be a file of type: jpg, jpeg, png, gif.',
            'fav_icon.max' => 'The favicon must not exceed 1 MB.',
        
            'short_company_description.required' => 'The short company description is required.',
            'short_company_description.string' => 'The short company description must be a valid string.',
            'short_company_description.min' => 'The short company description must be at least 5 characters long.',
            'short_company_description.max' => 'The short company description must not exceed 1000 characters.',
        
            'full_company_address.required' => 'The full company address is required.',
            'full_company_address.string' => 'The full company address must be a valid string.',
            'full_company_address.min' => 'The full company address must be at least 5 characters long.',
            'full_company_address.max' => 'The full company address must not exceed 1000 characters.',
        
            'google_map_address_link.required' => 'The Google Map address link is required.',
            'google_map_address_link.string' => 'The Google Map address link must be a valid string.',
            'google_map_address_link.min' => 'The Google Map address link must be at least 5 characters long.',
        ]);

        Setting::where('title', 'official_contact_number_1')->update([
            'content' => $request->official_contact_number_1
        ]);
        Setting::where('title', 'website')->update([
            'content' => $request->website
        ]);
        Setting::where('title', 'official_contact_number_2')->update([
            'content' => $request->official_contact_number_2
        ]);
        Setting::where('title', 'official_email')->update([
            'content' => $request->official_email
        ]);
        Setting::where('title', 'full_company_name')->update([
            'content' => $request->full_company_name
        ]);
        Setting::where('title', 'pretty_company_name')->update([
            'content' => $request->pretty_company_name
        ]);
        if ($request->hasFile('company_logo')) {
            $logoExtension = $request->file('company_logo')->getClientOriginalExtension();
            $logoPath = $request->file('company_logo')->move('uploads/website/'.time().'.'.$logoExtension);
            Setting::where('title', 'company_logo')->update(['content' => $logoPath]);
        }
        
        if ($request->hasFile('fav_icon')) {
            $faviconExtension = $request->file('fav_icon')->getClientOriginalExtension();
            $faviconPath = $request->file('fav_icon')->move('uploads/website/'.time().'.'.$faviconExtension);
            Setting::where('title', 'fav_icon')->update(['content' => $faviconPath]);
        }
        Setting::where('title', 'short_company_description')->update([
            'content' => $request->short_company_description
        ]);
        Setting::where('title', 'full_company_address')->update([
            'content' => $request->full_company_address
        ]);
        Setting::where('title', 'google_map_address_link')->update([
            'content' => $request->google_map_address_link
        ]);

        return redirect()->back()->with('success', 'Content updated');

    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Service;
use App\Models\ChildService;
use App\Models\Key_Feature;
use App\Models\Use_case;
use App\Models\WhyChooseUs;
use App\Models\Subscription;
use App\Models\Setting;
use App\Models\Feature;

class IndexController extends Controller
{
    public function index(){

        return view('front.home');
    }

    public function services($slug){      
        $service = Service::with(['childService' => function($query) {
            $query->where('deleted_at', 1); // Only include child services that are not deleted
        }])
        ->where('slug', $slug)
        ->where('deleted_at', 1) // Ensure the service itself is not deleted
        ->first();
        $whyChooseUs = WhyChooseUs::get();
        $features = Feature::where('service_id',$service->id)->where('deleted_at',1)->where('status',1)->get();
        return view('front.services',compact('service','whyChooseUs','features'));
    }

    public function servicesContact(Request $request){
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'mobile'     => 'required|string',
            'email'      => 'required|email',
            'message'    => 'required',
            'from_where'    => 'required|string',
        ]);

        $leads = new Lead();
        $leads->first_name = $request->first_name;
        $leads->mobile = $request->mobile;
        $leads->email = $request->email;
        $leads->message = $request->message;
        $leads->from_where = $request->from_where;
        $leads->save();

        return response()->json([
            'success'=>true,
            'status'=>200
        ]);
    }

    public function childServices($parent_slug,$slug){
    
        $service = Service::where('slug',$parent_slug)->first();
        $child_service = ChildService::where('slug',$slug)->first();
        if($service &&  $child_service){
            $key_features = Key_Feature::where('child_service_id',$child_service->id)->where('deleted_at',1)->get();
            $use_cases = Use_case::where('child_service_id',$child_service->id)->where('status',1)->where('deleted_at',1)->get();
            return view('front.child_service',compact('child_service','key_features','use_cases'));
        }else{
           return view('front.error.404');
        }
    }
    
    public function ExploreSolutions($slug)
    {
      
        // Find the service by slug
        $service = Service::where('slug', $slug)
            ->where('deleted_at', 1) // Ensure the service itself is not deleted
            ->first();
        
        if ($service) {
            // Fetch child services related to this service
            $child_services = ChildService::where('service_id', $service->id)
                ->where('deleted_at', 1) 
                ->get();
            return view('front.explore_solution', compact('service', 'child_services'));
        } 
        else {
            return view('front.error.404');
        }
    }

    public function Usersubcription(Request $request){
      
        $request->validate([
            'email' => 'required|email',
        ]);

        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->save();
        return response()->json([
            'success'=>true,
            'message'=>'Subscription Successfull!'
        ]);
    }


    public function ContactUs(){
        $settings = [
            'address' => Setting::where('title', 'full_company_address')->first(),
            'email' => Setting::where('title', 'official_email')->first(),
            'google_map' => Setting::where('title', 'google_map_address_link')->first()
        ];
    
        return view('front.contactus',compact('settings'));
    }

    public function ContactLeads(Request $request){
        // dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email'      => 'required|email',
            'message'    => 'required',
            'from_where'    => 'required|string',
        ]);

        $leads = new Lead();
        $leads->first_name = $request->first_name;
        $leads->email = $request->email;
        $leads->message = $request->message;
        $leads->from_where = $request->from_where;
        $leads->save();

        return response()->json([
            'success'=>true,
            'status'=>200
        ]);
    }
    
    public function AboutUs(){
        return view('front.aboutus');
    }




    

   




    
}

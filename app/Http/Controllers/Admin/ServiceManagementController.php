<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ChildService;
use App\Models\Key_Feature;
use App\Models\Use_case;
use App\Models\Demo_Video;
use App\Models\Feature;

class ServiceManagementController extends Controller
{
    public function index(Request $request){
        $search = $request->input('table_search');

        $query = Service::where('deleted_at',1);
        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%");
        }
        $query->orderBy('position');
        $service = $query->paginate(20);

        return view('admin.Service.index',compact('service'));
    }

    public function create(){
        return view('admin.Service.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'string|required',
            'visibility_status'=>'string|required',
            'headline'=>'nullable',
            'sub_headline'=>'nullable',
            'sub_title'=>'nullable',
            'description'=>'required'
        ]);

        $service = new Service();
        $service->title = $request->name?? '';
        $service->visibility_status = strtolower(trim($request->visibility_status))?? '';
        $service->headline = $request->headline?? '';
        $service->sub_headline = $request->sub_headline?? '';
        $service->sub_title = $request->sub_title?? '';
        $service->description = $request->description?? '';
        $service->slug = slugGenerate($service->title,'services')?? '';
        $service->save();

        return redirect()->route('service_management.list.all')->with('success','Services added successfully');
    }

    public function toggleStatus(Request $request)
{
    $service = Service::find($request->id);
    
    if ($service) {
        $service->status = $request->status;
        $service->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 400);
}

   public function edit($id){
       $service = Service::findOrFail($id);
       return view('admin.Service.edit',compact('service'));
   }

   public function update(Request $request){
        $request->validate([
            'name'=>'string|required',
            'visibility_status'=>'nullable',
            'headline'=>'nullable',
            'sub_headline'=>'nullable',
            'sub_title'=>'nullable',
            'description'=>'required'
        ]);
        $service = Service::findOrFail($request->id);
        $service->title = $request->name;
        $service->visibility_status = strtolower(trim($request->visibility_status));
        $service->headline = $request->headline;
        $service->sub_headline = $request->sub_headline;
        $service->sub_title = $request->sub_title;
        $service->description = $request->description;
        $service->slug = slugGenerateUpdate($service->title,'services',$service->id);
        $service->save();

        return redirect()->route('service_management.list.all')->with('success','Services updated successfully');
   }

   public function delete($id){
      $service = Service::findOrfail($id);
      $service->deleted_at = ($service->deleted_at == 1)? 0 : 1;
      $service->save();

      return redirect()->route('service_management.list.all')->with('success','Services deleted successfully');
    }


   public function show(Request $request,$id){
     $search = $request->input('table_search');
      $service = Service::findOrfail($id);
      $child_service = ChildService::where('service_id', $id)
                                    ->where('deleted_at',1)
                                    ->when($search, function($query, $search) {
                                        return $query->where('title', 'LIKE', "%{$search}%");
                                    })
                                    ->orderBy('position')
                                    ->paginate(20);
      return view('admin.Service.show',compact('service','child_service'));
   }

    //Features
    public function features(Request $request,$id){
         $search = $request->input('table_search');
        $service = Service::with('features')->findOrFail($id);
        $features = $service->features()
                             ->when($search, function($query) use($search){
                              $query->where('title','LIKE','%'.$search.'%');
                               })
                            ->latest()
                            ->where('deleted_at',1)
                            ->paginate(20);
        return view('admin.Service.features.index',compact('service','features'));
    }

    public function featuresCreate($id){
        $service = Service::with('features')->findOrFail($id);
        return view('admin.Service.features.create',compact('service'));
    }

    public function featuresStore(Request $request){
        // dd($request->all());
        // Fetch the service to check its visibility status
         $service = Service::findOrFail($request->service_id);
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,gif,jpg,jpeg,webp,jfif|dimensions:width=400,height=400',
        ];
        
        $request->validate($rules, [
            'image.dimensions' => 'The image must be exactly 400x400 pixels.',
        ]);
    
    
        if ($service->visibility_status !== 'archived') {
            $rules['sub_title'] = 'required|string|max:255';
            $rules['image_description'] = 'required';
        } else {
            $rules['sub_title'] = 'nullable|string|max:255';
            $rules['image_description'] = 'nullable';
        }
    
        $request->validate($rules);

        $features = new Feature();
        $features->title = $request->title;
        $features->sub_title = $request->sub_title;
        $features->slug = slugGenerate($request->title,'features');
        $features->service_id = $request->service_id;
        $features->description = $request->description;
        $features->image_description = $request->image_description;
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/service/features');
            $file->move($imgPath,$fileName);
            $features->image = "uploads/service/features/".$fileName;
        }
        $features->save();
        return redirect()->route('service_management.features', $request->service_id)
        ->with('success', 'Features added successfully!');
    }

    public function featuresEdit($serviceId,$featuresId){
        // dd($serviceId,$featuresId);
        $service = Service::findOrFail($serviceId);
        $features = Feature::findOrFail($featuresId);
        return view('admin.Service.features.edit',compact('service','features'));
    }

    public function featuresUpdate(Request $request){
        $service = Service::findOrFail($request->service_id);
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,gif,jpg,jpeg,webp,jfif|dimensions:width=400,height=400',
        ];
        
          $request->validate($rules, [
            'image.dimensions' => 'The image must be exactly 400x400 pixels.',
        ]);
    
        if ($service->visibility_status !== 'archived') {
            $rules['sub_title'] = 'required|string|max:255';
            $rules['image_description'] = 'required';
        } else {
            $rules['sub_title'] = 'nullable|string|max:255';
            $rules['image_description'] = 'nullable';
        }
    
        $request->validate($rules);

        $features = Feature::findOrFail($request->features_id);
        $features->title = $request->title;
        $features->sub_title = $request->sub_title;
        $features->slug = slugGenerateUpdate($request->title,'features',$request->features_id);
        $features->service_id = $request->service_id;
        $features->description = $request->description;
        $features->image_description = $request->image_description;
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/service/features');
            $file->move($imgPath,$fileName);
            $features->image = "uploads/service/features/".$fileName;
        }
        $features->save();
        return redirect()->route('service_management.features', $request->service_id)
        ->with('success', 'Features updated successfully!');
    }

    public function featurestoggleStatus(Request $request){
        $features = Feature::find($request->id);
        if($features){
            $features->status = $request->status;
            $features->save();
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);

    }

    public function featuresDelete($id){
        $features = Feature::findOrFail($id);
        $features->deleted_at = ($features->deleted_at == 1)? 0:1;
        $features->save();
        return redirect()->route('service_management.features',$features->service_id)->with('success',"Feature Deleted Successfully");

    }


   public function updateServiceOrder(Request $request){
            
    $order = $request->order; // Array of IDs in the new order
    foreach ($order as $position => $id) {
        Service::where('id', $id)
            ->update(['position' => $position + 1]);
    }
    return response()->json(['message' => 'Order updated successfully!']);
   }

   public function ChildServiceCreate($serviceId){
      $service = Service::findOrFail($serviceId);
      return view('admin.ChildService.create',compact('service'));
   }

   public function ChildServiceStore(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'logo' => 'required|mimes:jpg,png,gif,jpg,jpeg,webp,jfif',
            'request_video'=>'nullable',
            'long_desc'=>'nullable'
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name may not be greater than 255 characters.',        
            'description.required' => 'Please provide a description for the child service.',      
            'logo.required' => 'A logo is required for the service.',
            'logo.mimes' => 'The logo must be a file of type: jpg, png, gif, jpeg, webp, jfif.',
            'request_video.required' => 'A Video is required for this service.'
        ]);

      $child_service = new ChildService();
      $child_service->title = $request->name ?? '';
      $child_service->slug = slugGenerate($child_service->title,'child_services') ?? '';
      $child_service->description = $request->description ?? '';
      $child_service->long_desc = $request->long_desc ?? '';
      $child_service->service_id = $request->service_id ?? '';
      if($request->logo){
         $file = $request->file('logo');
         $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
         $imgPath = public_path('uploads/child_service');
         $file->move($imgPath,$fileName);
         $child_service->logo = "uploads/child_service/".$fileName ?? '';
      }
      if($request->request_video){
         $file = $request->file('request_video');
         $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
         $imgPath = public_path('uploads/demo_video');
         $file->move($imgPath,$fileName);
         $child_service->request_video = "uploads/demo_video/".$fileName ?? '';
      }

      $child_service->save();
      // Redirect with a success message
      return redirect()->route('service_management.show', $request->service_id)
                       ->with('success', 'Child Service added successfully!');        
   }
  
    // Toggle Status for Child services
    public function ChildServicetoggleStatus(Request $request)
    {
        $childService = ChildService::find($request->id);
        
        if ($childService) {
            $childService->status = $request->status;
            $childService->save();
            
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }
        
        return response()->json(['success' => false, 'message' => 'Service not found']);
    }

    // 
    public function ChildServiceDelete($serviceId){
        $child_service = ChildService::findOrFail($serviceId);
        $child_service->deleted_at = ($child_service->deleted_at == 1)? 0 : 1;
        $child_service->save();
        return redirect()->route('service_management.show', $child_service->service_id)
        ->with('success', 'Child Service deleted successfully!');  
    }

    public function ChildServiceEdit($serviceId){
        $child_service = ChildService::findOrFail($serviceId);
        return view('admin.ChildService.edit',compact('child_service'));
    }

    public function ChildServiceUpdate(Request $request){
        $child_service = ChildService::findOrFail($request->child_service_id);
        $child_service->title = $request->name;
        $child_service->slug = slugGenerateUpdate($child_service->title,'child_services',$request->child_service_id);
        $child_service->description = $request->description;
        $child_service->long_desc = $request->long_desc;
        $child_service->service_id = $request->service_id;
        if($request->logo){
           $file = $request->file('logo');
           $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
           $imgPath = public_path('uploads/child_service');
           $file->move($imgPath,$fileName);
           $child_service->logo = "uploads/child_service/".$fileName;
        }

        if($request->request_video){
            $file = $request->file('request_video');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('uploads/demo_video');
            $file->move($imgPath,$fileName);
            $child_service->request_video = "uploads/demo_video/".$fileName;
        }
  
        $child_service->save();
        return redirect()->route('service_management.show', $request->service_id)
        ->with('success', 'Child Service updated successfully!');   
    }

    // Drag and drop function for child services
    public function updateOrder(Request $request) {
        // Loop through the order array and update each item's position
        $order = $request->input('order');
        
        foreach ($order as $index => $id) {
            ChildService::where('id', $id)->update(['position' => $index + 1]);
        }
    
        return response()->json(['success' => true]);
    }

    // Key Features for the Child Services
    public function ChildServiceKeyFeatures($id,Request $request){
        $search = $request->input('table_search');

        $childService = ChildService::with('keyFeatures')->findOrFail($id);
        $key_features = $childService->keyFeatures()
                                      ->where('deleted_at',1)
                                      ->when($search, function($query) use($search){
                                        $query->where('title','LIKE','%'.$search.'%');
                                      })
                                      ->latest()
                                      ->paginate(20);
        return view('admin.ChildService.key_features.index',compact('childService','key_features'));
    }

    public function ChildServiceKeyFeaturesCreate($id){
        $childService = ChildService::findOrFail($id);
        return view('admin.ChildService.key_features.create',compact('childService'));
    }

    public function ChildServiceKeyFeaturesStore(Request $request){
        // dd($request->all());
        $request->validate([
            'title'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,gif,jfif,webp'
        ]);

        $key_features = new Key_Feature();
        $key_features->title = $request->title;
        $key_features->child_service_id = $request->child_service_id;
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalName();
            $imgPath = public_path('uploads/key_features');
            $file->move($imgPath,$fileName);
            $key_features->image = 'uploads/key_features/'.$fileName;
        }
        $key_features->save();
        return redirect()->route('service_management.child-service.key-features',$request->child_service_id)->with('success','Key features created successfully');
    }

    public function ChildServiceKeyFeaturesEdit($childServiceId,$keyFeaturesId){
        $childService = ChildService::findOrFail($childServiceId); // Fetch the child service
        $key_features = Key_Feature::findOrFail($keyFeaturesId);  // Fetch the key feature by its ID
        return view('admin.ChildService.key_features.edit',compact('childService','key_features'));
    }

    public function ChildServiceKeyFeaturesUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'title'=>'required',
            'image'=>'nullable|mimes:jpg,png,jpeg,gif,jfif,webp'
        ]);

        $key_features = Key_Feature::findOrFail($request->key_features_id);
        $key_features->title = $request->title;
        $key_features->child_service_id = $request->child_service_id;
        if($request->image){
            $file = $request->file('image');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalName();
            $imgPath = public_path('uploads/key_features');
            $file->move($imgPath,$fileName);
            $key_features->image = 'uploads/key_features/'.$fileName;
        }
        $key_features->save();
        return redirect()->route('service_management.child-service.key-features',$request->child_service_id)->with('success','Key features updated successfully');
    }

    public function ChildServiceKeyFeaturesStatus(Request $request){
        $key_features = Key_Feature::find($request->id);
        
        if ($key_features) {
            $key_features->status = $request->status;
            $key_features->save();
            
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }
        
        return response()->json(['success' => false, 'message' => 'key features not found']);
    }

   public function ChildServiceKeyFeaturesDelete($keyFeaturesId){
      $key_features = Key_Feature::findOrFail($keyFeaturesId);
      $key_features->deleted_at = ($key_features->deleted_at == 1)? 0: 1;
      $key_features->save();

      return redirect()->route('service_management.child-service.key-features',$key_features->id)->with('success','Key features deleted successfully');
   }

   public function UseCases($id,Request $request){
      $search = $request->input('table_search');
      $childService = ChildService::with('useCases')->findOrFail($id);
      $use_cases = $childService->useCases()->where('deleted_at',1)
                                            ->when($search,function($query) use($search){
                                                $query->where('title','LIKE','%'.$search.'%');
                                            })
                                            ->latest()->paginate(20);
      return view('admin.ChildService.use_cases.index',compact('childService','use_cases'));
   }

   public function UseCasesCreate($id){
      $childService = ChildService::findOrFail($id);
      return view('admin.ChildService.use_cases.create',compact('childService'));
   }

   public function UseCasesStore(Request $request){
    // dd($request->all());
      $request->validate([
          'title'=> 'required',
          'logo'=>'required|mimes:jpg,jpeg,png,gif,jfif,webp',
          'short_desc'=>'required'
      ]);

      $use_case = new Use_case();
      $use_case->title = $request->title;
      $use_case->short_desc = $request->short_desc;
      $use_case->child_service_id = $request->child_service_id;
      if($request->logo){
        $file = $request->file('logo');
        $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
        $imgPath = public_path("uploads/use_cases");
        $file->move($imgPath,$fileName);
        $use_case->logo = "uploads/use_cases/".$fileName;
      }
      $use_case->save();
      return redirect()->route('child-service.use_cases',$request->child_service_id)->with('success','Use Cases created successfully');

   }

   public function UseCasesStatus(Request $request){
      $use_case = Use_case::find($request->id);
      if($use_case){
        $use_case->status = $request->status;
        $use_case->save();

        return response()->json([
            'success'=> true,
            'message'=>'Status Updated Successfully'
        ]);
      }
      else{
        return response()->json([
            'success'=> false,
            'message'=>'Use case not found'
        ]);
      }
   }

   public function UseCasesEdit($child_service_id,$use_case_id){
      $childService = ChildService::findOrFail($child_service_id);
      $use_case_data = Use_case::findOrFail($use_case_id);
      return view('admin.ChildService.use_cases.edit',compact('childService','use_case_data'));
    }

    public function UseCasesUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'title'=> 'required',
            'logo'=>'nullable|mimes:jpg,jpeg,png,gif,jfif,webp',
            'short_desc'=>'required'
        ]);

        $use_case = Use_case::findOrFail($request->use_case_id);
        $use_case->title = $request->title;
        $use_case->child_service_id = $request->child_service_id;
        $use_case->short_desc = $request->short_desc;
        if($request->logo){
            $file = $request->file('logo');
            $fileName = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
            $imgPath = public_path("uploads/use_cases");
            $file->move($imgPath,$fileName);
            $use_case->logo = "uploads/use_cases/".$fileName;
          }
          $use_case->save();
          return redirect()->route('child-service.use_cases',$request->child_service_id)->with('success','Use Cases updated successfully');

        }

        public function UseCasesDelete($use_case_id){
           $use_case = Use_case::findOrFail($use_case_id);
           $use_case->deleted_at = ( $use_case->deleted_at == 1)? 0: 1;
           $use_case->save();
          return redirect()->route('child-service.use_cases',$use_case->child_service_id)->with('success','Use Cases deleted successfully');
        }


       

      
        

        






    
      






    
    

}

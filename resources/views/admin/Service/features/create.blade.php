@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Feature for {{$service->title}}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('service_management.features',$service->id)}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">	
                <form action="{{route('service_management.features.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf						
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Name" value="{{old('title')}}">	
                            </div>
                            @error('title')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        @if ($service->visibility_status != "archived")
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="sub_title">Sub-Title</label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Name" value="{{old('sub_title')}}">	
                            </div>
                            @error('sub_title')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                           
                        @endif
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" >	
                                <input type="hidden" name="service_id" value="{{$service->id}}">	
                            </div>
                            @error('image')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>	
                        @if ($service->visibility_status != "archived")   
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="image_description">Image Description</label>
                                <textarea name="image_description" id="image_description" class="form-control ckeditor">{{old('image_description')}}</textarea>	
                            </div>
                            @error('image_description')
                                <p class="text-danger small">{{$message}}</p>
                           @enderror
                        </div>		
                        @endif

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control ckeditor">{{old('description')}}</textarea>	
                            </div>
                            @error('description')
                                <p class="text-danger small">{{$message}}</p>
                           @enderror
                        </div>									
                      							
                    </div>
              
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-info">Create</button>
            <a href="{{route('service_management.features',$service->id)}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
      </form>	
    </div>
    <!-- /.card -->
</section>
@endsection
@section('customJs')
   
@endsection
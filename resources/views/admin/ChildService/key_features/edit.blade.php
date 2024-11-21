@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Key Feature for {{ $childService->title }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('service_management.child-service.key-features',$childService->id)}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
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
                <form action="{{route('service_management.child-service.key-features.update')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter your title" value="{{$key_features->title}}">	
                                    @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <img src="{{asset($key_features->image)}}" alt="no-image" width="85px">	
                                    <input type="hidden" name="child_service_id" value="{{$childService->id}}">
                                    <input type="hidden" name="key_features_id" value="{{$key_features->id}}">
                                    @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>									
                        </div>
                    </div>							
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-info">Update</button>
                    <a href="{{route('service_management.child-service.key-features',$childService->id)}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
        </form>
    </div>
    <!-- /.card -->
</section>
@endsection
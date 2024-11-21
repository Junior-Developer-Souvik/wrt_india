@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update {{$child_service->title}}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('service_management.show',$child_service->service_id)}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
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
                <form action="{{route('service_management.child-service.update')}}" method="POST" enctype="multipart/form-data">	
                    @csrf					
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{$child_service->title}}">	
                        </div>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" >	
                            <img src="{{asset($child_service->logo)}}" alt="no-image" width="80px" id="img">
                            <input type="hidden" name="child_service_id" value="{{$child_service->id}}">
                            <input type="hidden" name="service_id" value="{{$child_service->service_id}}">
                        </div>
                        @error('logo')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>	
                    @if ($child_service->service_id == 1)
                        
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">Video</label>
                            <input type="file" name="request_video" id="request_video" class="form-control @error('request_video') is-invalid @enderror">	
                            @if($child_service->request_video) 
                                <video width="150" controls>
                                    <source src="{{asset($child_service->request_video)}}" type="video/mp4">
                                </video>
                            @endif
                        </div>
                        @error('request_video')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>	
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="long_desc">Long Description</label>
                            <textarea  name="long_desc" id="long_desc" value="" class="form-control @error('long_desc') is-invalid @enderror" placeholder="Write your long description">{{$child_service->long_desc}}</textarea>	
                        </div>
                        @error('long_desc')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>	
                    @endif
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea  name="description" id="description" value="" class="form-control @error('description') is-invalid @enderror ckeditor" placeholder="Name">{!!$child_service->description!!}</textarea>	
                        </div>
                        @error('description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>	
                    								
                </div>               
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-info">Update</button>
            <a href="{{route('service_management.show',$child_service->service_id)}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</section>
@endsection
@section('customJs')
    <script>
         ClassicEditor
        .create( document.querySelector( '#description' ))
        .catch( error => {
            console.error( error );
        });
    </script>
@endsection
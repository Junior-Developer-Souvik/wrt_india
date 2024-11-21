@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Child Service</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('service_management.show',$service->id)}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>
                    Back</a>
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
                <form action="{{route('service_management.child-service.store')}}" method="POST" enctype="multipart/form-data">	
                    @csrf					
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{old('name')}}">	
                        </div>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" onchange="UploadImg(event)">	
                            <div id="img-preview"></div>
                            <input type="hidden" name="service_id" value="{{$service->id}}">
                        </div>
                        @error('logo')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>	
                    @if ($service->title == 'Vision Tech Solutions')
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="">Video</label>
                                <input type="file" name="request_video" id="request_video" class="form-control @error('request_video') is-invalid @enderror">	
                                <input type="hidden" name="service_id" value="{{$service->id}}">
                            </div>
                            @error('request_video')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="long_desc">Long Description</label>
                                <textarea  name="long_desc" id="long_desc" value="{{old('long_desc')}}" class="form-control @error('long_desc') is-invalid @enderror ckeditor" placeholder="Write your long description"></textarea>	
                            </div>
                            @error('long_desc')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>		
                    @endif
                  
                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea  name="description" id="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror ckeditor" placeholder="Write your short description"></textarea>	
                        </div>
                        @error('description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>									
                   								
                </div>               
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-info">Create</button>
            <a href="{{route('service_management.show',$service->id)}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</section>
@endsection
@section('customJs')
    <script>
        

        function UploadImg(event){
            // console.log(event.target.files[0]);
            var file = event.target.files[0];
            var binaryImg = URL.createObjectURL(file);
            document.getElementById('img-preview').innerHTML = `<img src="${binaryImg}" width="80px" class="img-thumbnail"/>`;
        }
    </script>
@endsection
@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Use Cases for {{$childService->title}}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('child-service.use_cases',$childService->id)}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
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
                <form action="{{route('child-service.use_cases.store')}}" method="POST" enctype="multipart/form-data">	
                @csrf							
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter your title" value="{{old('title')}}">	
                            <input type="hidden" name="child_service_id" value="{{$childService->id}}">
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror">	
                            @error('logo')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>									
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="short_desc">Short Description</label>
                            <textarea  name="short_desc" id="short_desc" class="form-control" placeholder="Enter your short description">{{old('short_desc')}}</textarea>	
                            @error('short_desc')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>    
                </div>	
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-info">Create</button>
            <a href="{{route('child-service.use_cases',$childService->id)}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</section>
@endsection
@section('customJs')
    <script>
         ClassicEditor
        .create( document.querySelector( '#short_desc' ))
        .catch( error => {
            console.error( error );
        });
    </script>
@endsection
@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create About</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('about_us.list.all')}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
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
             <form action="{{route('about_us.store')}}" method="POST" enctype="multipart/form-data">
                @csrf						
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title1">Title 1</label>
                            <input type="text" name="title1" id="title1" class="form-control" placeholder="Enter First Title" value="{{old('title1')}}">	
                        </div>
                        @error('title1')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="desc1">Description 1</label>
                            <textarea name="desc1" id="desc1" class="form-control ckeditor" >{{old('desc1')}}</textarea>	
                        </div>
                        @error('desc1')
                           <p class="text-danger small">{{$message}}</p>
                       @enderror
                    </div>									
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title2">Title 2</label>
                            <input type="text" name="title2" id="title2" class="form-control" placeholder="Enter Second Title"  value="{{old('title2')}}">	
                        </div>
                        @error('title2')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="desc2">Description 2</label>
                            <textarea name="desc2" id="desc2" class="form-control ckeditor">{{old('desc2')}}</textarea>	
                        </div>
                          @error('desc2')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>	
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="image1">Image1</label>
                            <input type="file" name="image1" id="image1" class="form-control">	
                        </div>
                          @error('image1')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>		
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image2">Image2</label>
                            <input type="file" name="image2" id="image2" class="form-control">	
                        </div>
                          @error('image')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>								
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image_title">Image Title</label>
                            <input type="text" name="image_title" id="image_title" class="form-control" placeholder="Enter Image Title" value="{{old('image_title')}}">	
                        </div>
                          @error('image_title')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>								
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="image_desc">Image Description</label>
                            <textarea name="image_desc" id="image_desc" class="form-control ckeditor">{{old('image_desc')}}</textarea>	
                        </div>
                          @error('image_desc')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>								
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-info">Create</button>
            <a href="{{route('about_us.list.all')}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>	
    </div>
    <!-- /.card -->
</section>
@endsection

@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update About</h1>
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
             <form action="{{route('about_us.update')}}" method="POST" enctype="multipart/form-data">
                @csrf						
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title1">Title 1</label>
                            <input type="text" name="title1" id="title1" class="form-control"  value="{{$about_us->title1}}">	
                        </div>
                        @error('title1')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="desc1">Description 1</label>
                            <textarea name="desc1" id="desc1" class="form-control ckeditor" >{!!$about_us->desc1!!}</textarea>	
                        </div>
                        @error('desc1')
                           <p class="text-danger small">{{$message}}</p>
                       @enderror
                    </div>									
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title2">Title 2</label>
                            <input type="text" name="title2" id="title2" class="form-control"   value="{{$about_us->title2}}">	
                        </div>
                        @error('title2')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="desc2">Description 2</label>
                            <textarea name="desc2" id="desc2" class="form-control ckeditor">{!!$about_us->desc2!!}</textarea>	
                        </div>
                          @error('desc2')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="image1">Image1</label>
                            <input type="file" name="image1" id="image1" class="form-control">
                            <img src="{{asset($about_us->image1)}}" alt="no-image" width="75px">	
                        </div>
                    </div>			
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image2">Image2</label>
                            <input type="file" name="image2" id="image2" class="form-control">
                            <img src="{{asset($about_us->image2)}}" alt="no-image" width="75px">	
                        </div>
                    </div>								
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image_title">Image Title</label>
                            <input type="text" name="image_title" id="image_title" class="form-control" value="{{$about_us->image_title}}">	
                        </div>
                        @error('image_title')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>								
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="image_desc">Image Description</label>
                            <textarea name="image_desc" id="image_desc" class="form-control ckeditor">{!!$about_us->image_desc!!}</textarea>	
                            <input type="hidden" name="about_us_id" value="{{$about_us->id}}">
                        </div>
                          @error('image_desc')
                           <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>								
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-info">Update</button>
            <a href="{{route('about_us.list.all')}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>	
    </div>
    <!-- /.card -->
</section>
@endsection

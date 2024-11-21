@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Why Choose Us</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('why_choose_us.list.all')}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
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
                <form action="{{route('why_choose_us.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf							
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{old('title')}}" id="title" class="form-control" placeholder="Enter your title">	
                        </div>
                        @error('title')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" >	
                        </div>
                        @error('image')
                             <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>									
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control ckeditor" placeholder="Enter your description">{{old('description')}}</textarea>	
                        </div>
                        @error('description')
                             <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>									
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary">Create</button>
            <a href="{{route('why_choose_us.list.all')}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</section>
@endsection
@section('customJs')
    
@endsection
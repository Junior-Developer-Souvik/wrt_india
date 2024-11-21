@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Service</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('service_management.list.all')}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
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
              <form action="{{route('service_management.update')}}" method="POST">	
                @csrf					
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Title</label>
                            <input type="text" name="name" id="name" value="{{$service->title}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter service name">	
                            <input type="hidden" name="id" value="{{$service->id}}">
                        </div>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>	
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="visibility_status">Visibility Status</label>
                            <select name="visibility_status" id="visibility_status" class="form-control @error('visibility_status') is-invalid @enderror">
                                <option value="" selected hidden>Select Visibility</option>
                                <option value="public" {{ old('visibility_status',$service->visibility_status) == 'public' ? 'selected' : '' }}>Public</option>
                                <option value="private" {{ old('visibility_status',$service->visibility_status) == 'private' ? 'selected' : '' }}>Private</option>
                                <option value="protected" {{ old('visibility_status',$service->visibility_status) == 'protected' ? 'selected' : '' }}>Protected</option>
                                <option value="archived" {{ old('visibility_status',$service->visibility_status) == 'archived' ? 'selected' : '' }}>Archived</option>
                                <option value="restricted" {{ old('visibility_status',$service->visibility_status) == 'restricted' ? 'selected' : '' }}>Restricted</option>
                            </select>
                        </div>
                        @error('visibility_status')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="headline">Headline</label>
                            <input type="text" name="headline" id="headline" value="{{$service->headline}}" class="form-control @error('headline') is-invalid @enderror" placeholder="Enter your headline">	
                        </div>
                        @error('headline')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>							
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sub_headline">Sub-Headline</label>
                            <input type="text" name="sub_headline" id="sub_headline" value="{{$service->sub_headline}}" class="form-control @error('sub_headline') is-invalid @enderror" placeholder="Enter your sub_headline">	
                        </div>
                        @error('sub_headline')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sub_title">Sub-Title</label>
                            <input type="text" name="sub_title" id="sub_title" value="{{$service->sub_title}}" class="form-control @error('sub_title') is-invalid @enderror" placeholder="Enter your sub-title">	
                        </div>
                        @error('sub_title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>		
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" value="" class="form-control @error('description') is-invalid @enderror ckeditor" placeholder="Enter your description">{!!$service->description!!}</textarea>	
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
            <a href="{{route('service_management.list.all')}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </form>
    </div>
    <!-- /.card -->
</section>
@endsection
@section('customJs')
  
        
@endsection
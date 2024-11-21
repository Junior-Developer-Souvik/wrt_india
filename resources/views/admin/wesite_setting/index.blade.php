@extends('admin.layouts.app')
@section('content')
<style>
    .star{
        color: red;
        font-size: 1.5em;
        vertical-align: -0.25em;
    
    }
</style>
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Website Settings</h1>
            </div>
            {{-- <div class="col-sm-6 text-right">
                <a href="{{route('admin.website-settings.index')}}" class="btn btn-info">
                    <i class="fas fa-chevron-left"></i> Back
                </a>
            </div> --}}
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
                <form action="{{route('admin.website-settings.update')}}" method="POST" enctype="multipart/form-data">	
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="official_contact_number_1">Official Contact Number 1<span class="star">*</span></label>
                                <input type="text" name="official_contact_number_1" id="official_contact_number_1" class="form-control @error('official_contact_number_1') is-invalid @enderror" placeholder="Official Contact Number 1" value="{{ old('official_contact_number_1') ? old('official_contact_number_1') : $data[0]->content }}">	
                                @error('official_contact_number_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="official_contact_number_2">Official Contact Number 2<span class="star" style="color: white">*</span></label>
                                <input type="text" name="official_contact_number_2" id="official_contact_number_2" class="form-control @error('official_contact_number_2') is-invalid @enderror" placeholder="Official Contact Number 2" value="{{ old('official_contact_number_2') ? old('official_contact_number_2') : $data[1]->content }}">	
                                @error('official_contact_number_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="official_email">Official Email<span class="star">*</span></label>
                                <input type="email" name="official_email" id="official_email"  class="form-control @error('official_email') is-invalid @enderror" placeholder="Official Email" value="{{ old('official_email') ? old('official_email') : $data[2]->content }}">	
                                @error('official_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="website">Website<span class="star">*</span></label>
                                <input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror" placeholder="Website URL" value="{{ old('website') ? old('website') : $data[3]->content }}">	
                                @error('website')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="full_company_name">Full Company Name<span class="star">*</span></label>
                                <input type="text" name="full_company_name" id="full_company_name"  class="form-control @error('full_company_name') is-invalid @enderror" placeholder="Full Company Name" value="{{ old('full_company_name') ? old('full_company_name') : $data[4]->content }}">	
                                @error('full_company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pretty_company_name">Pretty Company Name<span class="star">*</span></label>
                                <input type="text" name="pretty_company_name" id="pretty_company_name"  class="form-control @error('pretty_company_name') is-invalid @enderror" placeholder="Pretty Company Name" value="{{ old('pretty_company_name') ? old('pretty_company_name') : $data[5]->content }}">	
                                @error('pretty_company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="company_logo">Company Logo<span class="star">*</span></label>
                                <input type="file" name="company_logo" id="company_logo" class="form-control @error('company_logo') is-invalid @enderror">	
                                <img src="{{asset($data[6]->content)}}" width="18.5%" alt="No-Image" class="img-thumbnail"/><br/>
                                @error('company_logo')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fav_icon">Fav-icon<span class="star">*</span></label>
                                <input type="file" name="fav_icon" id="fav_icon" class="form-control @error('fav_icon') is-invalid @enderror">	
                                <img src="{{asset($data[7]->content)}}" width="20%" alt="No-Image" class="img-thumbnail"/><br/>
                                @error('fav_icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="short_company_description">Short Company Description<span class="star">*</span></label>
                                <textarea name="short_company_description" id="short_company_description" class="form-control @error('short_company_description') is-invalid @enderror ckeditor" placeholder="Short Company Description">{{ old('short_company_description') ? old('short_company_description') : $data[8]->content }}</textarea>	
                                @error('short_company_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="full_company_address">Full Company Address<span class="star">*</span></label>
                                <textarea name="full_company_address" id="full_company_address" class="form-control @error('full_company_address') is-invalid @enderror" placeholder="Full Company Address">{{ old('full_company_address') ? old('full_company_address') : $data[9]->content }}</textarea>	
                                @error('full_company_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="google_map_address_link">Google Map Address Link<span class="star">*</span></label>
                                <input type="text" name="google_map_address_link" id="google_map_address_link"  class="form-control @error('google_map_address_link') is-invalid @enderror" placeholder="Google Map Address Link" value="{{ old('google_map_address_link') ? old('google_map_address_link') : $data[10]->content }}">	
                                @error('google_map_address_link')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>							
        </div>
        <!-- /.card -->
    </div>
</section>
@endsection
@section('customJs')
    <script>
        ClassicEditor
        .create(document.querySelector('#short_company_description'))
        .catch(error => {
            console.error(error);
        });
    </script>
@endsection

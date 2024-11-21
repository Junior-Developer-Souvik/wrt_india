@extends('front.layouts.app')
@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{asset('front_assets/images/banner/bnr1.jpg')}});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Contact Us</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner bg-white contact-style-1">
        <div class="container">
            <div class="row">
                <!-- right part start -->
                <div class="col-lg-4 col-md-6 d-flex m-b30">
                    <div class="p-a30 border contact-area border-1 align-self-stretch radius-sm">
                        <h3 class="m-b5">Quick Contact</h3>
                        <p>If you have any questions simply use the following contact details.</p>
                        <ul class="no-margin">
                            <li class="icon-bx-wraper left m-b30">
                                <div class="icon-bx-xs border-1"> <a href="javascript:void(0);" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
                                <div class="icon-content">
                                    <h6 class="text-uppercase m-tb0 dlab-tilte">Address:</h6>
                                    <p>{{$settings['address']?$settings['address']->content:"" }}</p>
                                </div>
                            </li>
                            <li class="icon-bx-wraper left  m-b30">
                                <div class="icon-bx-xs border-1"> <a href="javascript:void(0);" class="icon-cell"><i class="ti-email"></i></a> </div>
                                <div class="icon-content">
                                    <h6 class="text-uppercase m-tb0 dlab-tilte">Email:</h6>
                                    <p>{{$settings['email']?$settings['email']->content:""}}</p>
                                </div>
                            </li>
                            <!-- <li class="icon-bx-wraper left">
                                <div class="icon-bx-xs border-1"> <a href="javascript:void(0);" class="icon-cell"><i class="ti-mobile"></i></a> </div>
                                <div class="icon-content">
                                    <h6 class="text-uppercase m-tb0 dlab-tilte">PHONE</h6>
                                    <p>+00 1234 5678 90</p>
                                </div>
                            </li> -->
                        </ul>
                        <div class="m-t20">
                            <ul class="dlab-social-icon border dlab-social-icon-lg">
                                <li><a href="javascript:void(0);" class="fab fa-facebook-f bg-primary"></a></li>
                                <li><a href="javascript:void(0);" class="fab fa-twitter bg-primary"></a></li>
                                <li><a href="javascript:void(0);" class="fab fa-linkedin-in bg-primary"></a></li>
                                <li><a href="javascript:void(0);" class="fab fa-pinterest-p bg-primary"></a></li>
                                <li><a href="javascript:void(0);" class="fab fa-google-plus-g bg-primary"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- right part END -->
                <!-- Left part start -->
                <div class="col-lg-4 col-md-6  mb-4 m-b30 mb-md-0">
                    <div class="p-a30 bg-gray clearfix radius-sm">
                        <h3 class="m-b10">Send Message Us</h3>
                        <div class="dzFormMsg"></div>
                        <form method="post" class="dzForm" id="ContactUsForm" action="{{route('front.contact_us.leads')}}">
                        <input type="hidden" value="Contact" name="dzToDo" >
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="first_name" id="first_name" type="text"  class="form-control" placeholder="Your Name">
                                        </div>
                                       <div id="first_name_error" class="text-danger small"></div> <!-- Error message placeholder -->
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group"> 
                                            <input name="email" id="email" type="email" class="form-control"   placeholder="Your Email Id" >
                                        </div>
                                       <div id="email_error" class="text-danger small"></div> <!-- Error message placeholder -->
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="message" id="message" rows="4" class="form-control"  placeholder="Your Message..."></textarea>
                                        </div>
                                       <div id="message_error" class="text-danger small"></div> <!-- Error message placeholder -->
                                    </div>
                                </div>
                                {{-- <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                            <input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-lg-12">
                                    <button name="submit" type="submit" value="Submit" class="site-button "> <span>Submit</span> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Left part END -->
                <div class="col-lg-4 d-flex m-b30">
                    <iframe src="{{$settings['google_map']?$settings['google_map']->content:""}}" style="border:0; width:100%; min-height:100%;" allowfullscreen></iframe>
                </div>
                
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
@endsection
@section('customJs')
    <script>
       $(document).ready(function () {
       $('#ContactUsForm').on('submit',function(e){
              e.preventDefault();
              // Clear previous error messages
             $('#first_name_error').text('');
             $('#email_error').text('');
             $('#message_error').text('');

             var firstName = $('#first_name').val();
             var email = $('#email').val();
             var message = $('#message').val();
             var from_where = window.location.href;
             let hasError = false;

             // Validate first name
             if (!firstName) {
                 $('#first_name_error').text('Name is required');
                 hasError = true;
             }

             // Validate email
             if (!email) {
                 $('#email_error').text('Email is required.');
                 hasError = true;
             } else {
                 // Simple regex for email validation
                 const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                 if (!emailPattern.test(email)) {
                     $('#email_error').text('Please enter a valid email address.');
                     hasError = true;
                 }
             }

             // Validate message
             if (!message) {
                 $('#message_error').text('Message is required.');
                 hasError = true;
             }

             // If there are validation errors, do not submit the form
             if (hasError) {
                 return;
             }

             $.ajax({
                 url: "{{route('front.contact_us.leads')}}",
                 type: "POST",
                 data: {
                     first_name:firstName,
                     email     : email,
                     message   : message,
                     from_where: from_where,
                     _token: '{{ csrf_token() }}' // CSRF token for security
                 },
                 dataType: "json",
                 success: function (response) {
                     toastr.success('Your request has been successfully submitted.');
                       $("#ContactUsForm")[0].reset();
                 },
                 error: function (xhr, status, error) {
                 // Handle error response
                    toastr.error('There was an error submitting your request. Please try again.');
                    console.log(xhr.responseText); // Log error for debugging
                } 
             });

       });
          $('#first_name').on('input', function() {
                 $('#first_name_error').text('');
             });
             $('#email').on('input', function() {
                 $('#email_error').text('');
             });
             $('#message').on('input', function() {
                 $('#message_error').text('');
             });
    }); 
    </script>
@endsection
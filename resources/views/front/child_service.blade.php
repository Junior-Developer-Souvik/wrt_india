@extends('front.layouts.app')
@section('content')
<div class="page-content bg-white pb-0">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url('{{asset('front_assets/images/banner/bnr2.jpg')}}');">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">{{$child_service->title}}</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <!--<li><a href="index.html">Home</a></li>-->
                        <li><button class="site-button btnhover13 mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Request a Demo
                    </button>
                    <button class="site-button btnhover13" data-bs-toggle="modal" data-bs-target="#videoModal">
                        Watch Demo Video
                    </button></li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
</div>
<!-- Content end -->

<div class="content-block">
    <!-- About Us -->
    <div class="section-full content-inner bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="facial">
                        <h2 class="title">{{$child_service->title}}</h2>
                        <p>
                           {{$child_service->long_desc}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services -->
    
    <!-- Modal for Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Demo Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <video width="100%" controls>
                        <source src="{{ asset($child_service->request_video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Services -->
    @if (!$key_features->isEmpty())
        <div class="section-full bg-gray">
        <div class="container">
            <div class="section-head text-left">
                <h2 class="title">Key Features</h2>
            </div>
            <div class="about-ser-carousel owl-carousel owl-theme owl-btn-center-lr owl-dots-primary-full owl-btn-3 m-b30 wow fadeIn"
                data-wow-duration="2s" data-wow-delay="0.2s">
             @foreach ($key_features as $key => $key_feature)
                <div class="item">
                    <div class="dlab-box service-media-bx">
                        <div class="dlab-media">
                            <a href="vision-tech-solutions.php"><img src="{{asset($key_feature->image)}}" class="lazy"
                                    data-src="{{asset($key_feature->image)}}" alt=""></a>
                        </div>
                        <div class="dlab-info text-center">
                            <h2 class="dlab-title"><a href="vision-tech-solutions.php">
                                  {{$key_feature->title}}</a>
                            </h2>
                            <p></p>
                            <!-- <a href="vision-tech-solutions.php" class="site-button btnhover13">Read More</a> -->
                        </div>
                    </div>
                </div>
             @endforeach
            </div>

        </div>
    </div>
    @endif
   
    <!-- Our Services End -->

    <!-- Our Services -->
    @if (count($use_cases)>0)
         <div class="section-full bg-gray use-case-pt50">
        <div class="container">
            <div class="section-head text-left">
                <h2 class="title">Use Cases</h2>
            </div>

            <div class="row row-cols-3">
                @foreach ($use_cases as $key => $use_case)
                    <div class="col">
                        <div class="service-box style3 security-box">
                            <div class="design-box-new icon-bx-wraper">
                                <div class="icon-bx-wraper2" data-name="{{$key<9? '0': ""}}{{$key+1}}">
                                    <div class="icon-lg">
                                        <a href="javascript:void(0);" class="icon-cell">
                                           <img src="{{asset($use_case->logo)}}" alt="no-image">
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <h2 class="dlab-tilte">{{$use_case->title}}</h2>
                                        {!!$use_case->short_desc!!}
                                        <a href="industry4.0.php" class="site-button btnhover13">Read More</a>
                                    </div>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
              
                {{-- <div class="col">
                    <div class="service-box style3 security-box">
                        <div class="icon-bx-wraper" data-name="02">
                            <div class="icon-lg">
                                <a href="javascript:void(0);" class="icon-cell"><i
                                        class="flaticon-fuel-station"></i></a>
                            </div>
                            <div class="icon-content">
                                <h2 class="dlab-tilte">Attendance Management</h2>
                                <p>Automate and streamline employee attendance tracking.</p>
                                <a href="industry4.0.php" class="site-button btnhover13">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box style3 security-box">
                        <div class="icon-bx-wraper" data-name="03">
                            <div class="icon-lg">
                                <a href="javascript:void(0);" class="icon-cell"><i class="flaticon-fuel-truck"></i></a>
                            </div>
                            <div class="icon-content">
                                <h2 class="dlab-tilte">Workforce Monitoring</h2>
                                <p>Monitor staff presence and movement to optimize operations</p>
                                <a href="industry4.0.php" class="site-button btnhover13">Read More</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
    @endif
   
    <!-- Our Services End -->

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request a Demo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="inquiry-form inner" id="request_demo">
                    <h3 class="title m-t0 m-b10">Let's Convert Your Idea into Reality</h3>
                    <!-- <p>Ready to take your business to new heights with Vision Tech? Reach out to us today to learn more
                        about our solutions and begin your transformational journey.
                    </p> -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="ti-user text-primary"></i></span>
                                    <input name="name" id="name" type="text" class="form-control"
                                        placeholder="First Name">
                                </div>
                                <div id="first_name_error" class="text-danger small"></div> <!-- Error message placeholder -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
                                    <input name="mobile" id="mobile" type="text"  class="form-control"
                                        placeholder="Phone">
                                </div>
                                <div id="mobile_error" class="text-danger small"></div> <!-- Error message placeholder -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="ti-email text-primary"></i></span>
                                    <input name="email" id="email" type="email" class="form-control" 
                                        placeholder="Your Email Id">
                                </div>
                                <div id="email_error" class="text-danger small"></div> <!-- Error message placeholder -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="ti-agenda text-primary"></i></span>
                                    <textarea name="message" id="message" rows="4" class="form-control" 
                                        placeholder="Tell us about your project"></textarea>
                                </div>
                                <div id="message_error" class="text-danger small"></div> <!-- Error message placeholder -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button name="submit" type="submit" value="Submit" class="site-button btn-block"> 
                            <span>Get A Free Quote!</span> 
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="site-button btnhover13" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customJs')
    <script>
       $(document).ready(function () {
          $('#request_demo').on('submit',function(e){
                e.preventDefault();
                 // Clear previous error messages
                $('#first_name_error').text('');
                $('#mobile_error').text('');
                $('#email_error').text('');
                $('#message_error').text('');

                var firstName = $('#name').val();
                var mobile = $('#mobile').val();
                var email = $('#email').val();
                var message = $('#message').val();
                var from_where = window.location.href;
                let hasError = false;

                // Validate first name
                if (!firstName) {
                    $('#first_name_error').text('First name is required');
                    hasError = true;
                }

                // Validate mobile
                if (!mobile) {
                    $('#mobile_error').text('Mobile is required.');
                    hasError = true;
                } else if (mobile.length !== 10 || !/^\d+$/.test(mobile)) {
                    $('#mobile_error').text('Mobile number must be exactly 10 digits.');
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
                    url: "{{route('front.services_contact_us')}}",
                    type: "POST",
                    data: {
                        first_name:firstName,
                        mobile    : mobile,
                        email     : email,
                        message   : message,
                        from_where: from_where,
                        _token: '{{ csrf_token() }}' // CSRF token for security
                    },
                    dataType: "json",
                    success: function (response) {
                        toastr.success('Your request has been successfully submitted.');
                        $('#exampleModal').modal('hide');
                    },
                    error: function (xhr, status, error) {
                    // Handle error response
                       toastr.error('There was an error submitting your request. Please try again.');
                       console.log(xhr.responseText); // Log error for debugging
                   } 
                });

          });
             $('#name').on('input', function() {
                    $('#first_name_error').text('');
                });
                $('#mobile').on('input', function() {
                    $('#mobile_error').text('');
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
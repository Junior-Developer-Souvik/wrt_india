@extends('front.layouts.app')
@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url('{{asset('front_assets/images/banner/bnr2.jpg')}}');">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Welcome to Our AI Solutions	
                </h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-full content-inner bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-head text-black">
                            <p>In today’s fast-paced world, staying ahead requires more than just traditional methods. Our cutting-edge AI-powered solutions are designed to streamline your operations, enhance productivity, and ensure the highest standards of quality and safety. Whether you’re in manufacturing, security, or compliance, we offer tailored solutions that meet your unique needs.	
                            </p>
                            <p>
                                Explore our range of services below, and discover how we can help you transform your business with the power of AI.	
                            </p>
                        </div>
                        <div class="section-content row">
                            @foreach ($child_services as $child)
                                <div class="col-lg-4 col-md-4 service-box style3">
                                    <div class="icon-bx-wraper">
                                        <div class="icon-lg">
                                            <a href="{{route('front.child_service', [$service->slug, $child->slug])}}" class="icon-cell">
                                                @if($child->logo) 
                                                    <img src="{{ asset($child->logo) }}" alt="{{ $child->title }}"> 
                                                @endif                        
                                            </a>
                                        </div>
                                        <div class="icon-content">
                                            <h2 class="dlab-tilte">{{$child->title}}</h2>
                                            <p>{{ strip_tags($child->description)}}</p>
                                            <a href="{{route('front.child_service', [$service->slug, $child->slug])}}" class="site-button btnhover13">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach                      
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Our Services -->
        <!-- Why Chose Us -->
        {{-- <div class="section-full content-inner-1 overlay-black-dark about-8-service bg-img-fix" style="background-image:url(images/background/bg1.jpg);">
            <div class="container">
                <div class="section-head text-white text-center">
                    <h2 class="title-box m-tb0 max-w800 m-auto">Amazing things happen to your business when we connect those dots of utility and value <span class="bg-primary"></span></h2>
                </div>
            </div> --}}
            
            <!-- <div class="choses-info text-white">
                <div class="container-fluid">
                    <div class="row choses-info-content">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-a30 wow zoomIn" data-wow-delay="0.2s">
                            <h2 class="m-t0 m-b10 font-weight-400 font-45"><i class="flaticon-alarm-clock m-r10"></i><span class="counter">15</span>+</h2>
                            <h4 class="font-weight-300 m-t0">Years in Business</h4>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 p-a30 wow zoomIn" data-wow-delay="0.4s">
                            <h2 class="m-t0 m-b10 font-weight-400 font-45"><i class="flaticon-worker m-r10"></i><span class="counter">700</span>+</h2>
                            <h4 class="font-weight-300 m-t0">Happy Clients</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-a30 wow zoomIn" data-wow-delay="0.6s">
                            <h2 class="m-t0 m-b10 font-weight-400 font-45"><i class="flaticon-settings m-r10"></i><span class="counter">50</span>+</h2>
                            <h4 class="font-weight-300 m-t0">Technical Experts</h4>
                        </div>
                    </div>
                </div>
            </div> -->
        {{-- </div> --}}
        <!-- Why Chose Us End -->
        <!-- Testimonials -->
        <!-- <div class="section-full content-inner wow fadeIn" data-wow-delay="0.4s">
            <div class="container">
                <div class="section-head text-center">
                    <h2 class="title">Our Testimonials</h2>
                </div>
                <div class="section-content m-b30 row">
                    <div class="testimonial-six owl-loaded owl-theme owl-carousel owl-none dots-style-2">
                        <div class="item">
                            <div class="testimonial-8">
                                <div class="testimonial-text">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the when an printer took a galley of type and scrambled it to make [...]</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius shadow"><img src="images/testimonials/pic1.jpg" width="100" height="100" alt=""></div>
                                    <h5 class="testimonial-name m-t0 m-b5">David Matin</h5> <span class="testimonial-position">Student</span> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-8">
                                <div class="testimonial-text">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the when an printer took a galley of type and scrambled it to make [...]</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius shadow"><img src="images/testimonials/pic1.jpg" width="100" height="100" alt=""></div>
                                    <h5 class="testimonial-name m-t0 m-b5">David Matin</h5> <span class="testimonial-position">Student</span> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-8">
                                <div class="testimonial-text">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the when an printer took a galley of type and scrambled it to make [...]</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius shadow"><img src="images/testimonials/pic1.jpg" width="100" height="100" alt=""></div>
                                    <h5 class="testimonial-name m-t0 m-b5">David Matin</h5> <span class="testimonial-position">Student</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Testimonials END -->
        <!-- Get in touch -->
        <!-- <div class="section-full overlay-black-dark bg-img-fix" style="background-image:url(images/background/bg1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 content-inner chosesus-content text-white">
                        <h2 class="title-box font-weight-300 m-b15 wow fadeInLeft" data-wow-delay="0.2s">Let's get in touch <span class="bg-primary"></span></h2>
                        <p class="font-16 op8 wow fadeInLeft" data-wow-delay="0.4s">Explore how Vision Tech can transform your operations and enhance security.</p>
                        <h3 class="font-weight-300 m-b50 op6 wow fadeInLeft" data-wow-delay="0.6s">Contact us to discover the power of visual technology for your organization.</h3>
                        <h4 class="font-weight-300 wow fadeInLeft" data-wow-delay="0.8s">& What you will get:</h4>
                        <ul class="list-checked primary wow fadeInLeft" data-wow-delay="1s">
                            <li><span>Contrary to popular belief, Lorem Ipsum is not simply</span></li>
                            <li><span>Random text. It has roots in a piece of classical Latin literature</span></li>
                            <li><span>Latin professor at Hampden-Sydney College in Virginia</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 col-md-12 m-b30">
                        <form class="inquiry-form contact-project bg-white box-shadow wow fadeInUp" data-wow-delay="0.2s">
                            <h3 class="title-box font-weight-300 m-t0 m-b10">Let's Convert Your Idea into Reality <span class="bg-primary"></span></h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-user text-primary"></i></span>
                                            <input name="dzName" type="text" required class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
                                            <input name="dzOther[Phone]" type="text" required class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group"> 
                                            <span class="input-group-addon"><i class="ti-email text-primary"></i></span>
                                            <input name="dzEmail" type="email" class="form-control" required  placeholder="Your Email Id" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-check-box text-primary"></i></span>
                                            <input name="dzOther[Subject]" type="text" required class="form-control" placeholder="Upload File">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-file text-primary"></i></span>
                                            <input name="dzOther[Subject]" type="text" required class="form-control" placeholder="Upload File">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-agenda text-primary"></i></span>
                                            <textarea name="dzMessage" rows="4" class="form-control" required placeholder="Tell us about your project or idea"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <button name="submit" type="submit" value="Submit" class="site-button button-lg"> <span>Get A Free Quote!</span> </button>
                                </div>
                            </div>
                        </form>	
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Get in touch -->
    </div>
    <!-- contact area END -->
</div>
@endsection
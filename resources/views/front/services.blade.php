@extends('front.layouts.app')
@section('content')
<style>
    
    .text-container h1 {
    font-size: 48px; /* Adjust the title font size */
    margin-bottom: 10px;
}

.text-container h2.headline {
    font-size: 28px; /* Adjust headline font size */
    margin-bottom: 5px;
}

.text-container p.sub-headline {
    font-size: 18px; /* Adjust sub-headline font size */
}

.breadcrumb-row {
    margin-top: 20px; /* Space between the text and breadcrumb */
}
</style>
<div class="page-content bg-white">
    <!-- inner page banner -->
   
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url('{{asset('front_assets/images/banner/bnr2.jpg')}}'); padding:51px 0;">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <div class="text-container">
                    <h1 class="text-white">{{$service->title}}</h1>
                    <h2 class="headline text-white">{{$service->headline}}</h2>
                    <p class="sub-headline text-white">{{$service->sub_headline}}</p>
                </div>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <button class="site-button btnhover13 mx-1 bann-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Request a Demo
                        </button>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-full content-inner bg-gray gradent-bg">
            <div class="container z-index99">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 text-center">
                        <div class="section-head text-black solutions-button">
                            @if ($service->visibility_status != 'protected' && $service->visibility_status != 'archived')
                               <h2 class="title">{{$service->sub_title}}</h2>
                            @endif
                            @if ($service->visibility_status != 'archived')
                                {!!$service->description!!}                               
                            @endif    
                              @if ($service->visibility_status == 'private')
                                <p>In today’s fast-paced world, staying ahead requires more than just traditional methods. Our cutting-edge AI-powered solutions are designed to streamline your operations, enhance productivity, and ensure the highest standards of quality and safety. Whether you’re in manufacturing, security, or compliance, we offer tailored solutions that meet your unique needs.	
                                </p>
                                 <p>
                                Explore our range of services below, and discover how we can help you transform your business with the power of AI.	
                                </p>
                              @endif
                            
                        </div>
                    </div>
                        {{-- <div class="col-md-12">
                            <a href="{{route('front.explore_solutions',$service->slug)}}" class="site-button btnhover13 mx-1">
                                Explore Our Solutions
                            </a>
                        </div> --}}
                    <div class="col-lg-12">
                        <div class="section-content row">
                            {{-- {{dd(count($service->childService))}} --}}
                        @if (count($service->childService)>0)
                            @if (count($service->childService) == 4)
                                    @foreach ($service->childService as $key=> $child)                                     
                                        <div class="col-lg-3 col-md-6 col-sm-12 service-box style3">
                                            
                                            <div class="icon-bx-wraper" data-name="{{$key<9?"0":""}}{{$key+1}}">
                                                <div class="icon-lg">
                                                    <a href="javascript:void(0);" class="icon-cell">
                                                        @if($child->logo) 
                                                            <img src="{{ asset($child->logo) }}" alt="{{ $child->title }}"> 
                                                        @endif                        
                                                    </a>
                                                </div>
                                                <div class="icon-content">
                                                    <h2 class="dlab-tilte">{{$child->title}}</h2>
                                                    <ul>
                                                        <li>{!!$child->description!!}</li>                               
                                                    </ul>
                                                    @if($service->visibility_status == 'private')
                                                        <a href="{{route('front.child_service',[$service->slug,$child->slug])}}" class="site-button btnhover13">Learn More</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                @endforeach 
                                @else
                                    @foreach ($service->childService as $key=> $child)                                     
                                        <div class="col-lg-4 col-md-6 col-sm-12 service-box style3">
                                            <div class="design-box-new icon-bx-wraper">
                                                <div class="icon-bx-wraper2" data-name="{{$key<9?"0":""}}{{$key+1}}">
                                                <div class="icon-lg">
                                                    <a href="javascript:void(0);" class="icon-cell">
                                                        @if($child->logo) 
                                                            <img src="{{ asset($child->logo) }}" alt="{{ $child->title }}"> 
                                                        @endif                        
                                                    </a>
                                                </div>
                                                <div class="icon-content">
                                                    <h2 class="dlab-tilte">{{$child->title}}</h2>
                                                    <ul>
                                                        <li>{!!$child->description!!}</li>                               
                                                    </ul>
                                                    @if($service->visibility_status == 'private')
                                                        <a href="{{route('front.child_service',[$service->slug,$child->slug])}}" class="site-button btnhover13">Learn More</a>
                                                    @endif
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach 
                                @endif 
                        @endif
                             @if($service->visibility_status == 'public')
                                <h1 class="title">Monitored Parameters</h1>

                                <ul class="list-check secondry">
                                    <li><b>Accelerometer – Vibration Sensor:</b> Detect vibration levels to assess machine health and identify potential faults.</li>
                                    <li><b>Ultrasound Sensor (Contact Type and Non-Contact Type):</b> Monitor ultrasound emissions for early detection of abnormalities.</li>
                                    <li><b>Temperature Sensor:</b> Track temperature variations to prevent overheating and component failure.</li>
                                    <li><b>Level Sensor:</b> Monitor fluid levels to ensure optimal operating conditions.</li>
									<li><b>Current Sensor:</b> Measure electrical current to identify anomalies and potential issues.</li>
									<li><b>Proximity Sensor: </b>Detect the proximity of objects to prevent collisions or malfunctions.</li>
									<li><b>RPM / Speed Sensor: </b>Monitor rotational speed to ensure machinery operates within safe limits.</li>
									<li><b>Pressure Sensor:</b> Measure pressure changes to detect leaks or system malfunctions.</li>	
									<li><b>Oil Analysis Sensor:</b> Analyze oil properties such as dielectric constant, dynamic viscosity, temperature, water activity, and moisture to assess lubricant condition and machine health.</li>	
									<li><b>Relay Output:</b> Act as a protection system, triggering alerts or shutdowns in case of abnormal conditions.</li>
                                </ul>
                                
                                <hr class="blue-border">

								 <h1 class="title">Process Modes</h1>

                                <ul class="list-check secondry">
                                    <li><b>Waveform Only:</b>  View raw waveform data for detailed analysis of machine vibrations.</li>
                                    <li><b>Spectrum and Waveform:</b> Analyze both frequency spectrum and waveform data to identify potential issues.</li>
									<li><b> Demodulation:</b> Detect bearing faults in early stages using demodulation techniques.</li>
									<li><b>Order Tracking:</b> Track orders of rotating machinery for precise fault diagnosis.</li>
									<li><b>Long Waveforms: </b> Store waveform data for up to 30 minutes without interruption, enabling comprehensive analysis.</li>
                                </ul>
                                
                                <hr class="blue-border">

								 <h1 class="title">Parameter Extraction</h1>

                                <ul class="list-check secondry">
                                    <li>Extract valuable parameters such as RMS, peak-to-peak values, kurtosis, crest factor, and peak/phase parameters for in-depth analysis.</li>
                                    <li>Build custom parameters based on spectral bands to monitor specific machine behaviors.</li>
									<li>Calculate real frequency and amplitude of spectral peaks using advanced algorithms for accurate fault detection.</li>
                                </ul>
                                
                                

								<p>With its unparalleled features and capabilities, the WOS T8 system redefines the way industries approach condition monitoring. From real-time data acquisition to advanced diagnostics and predictive maintenance, WOS T8 empowers businesses to optimize machine performance, minimize downtime, and enhance operational efficiency like never before. Experience the future of condition monitoring with WOS T8 today.</p>
								
                             @elseif($service->visibility_status == 'protected')
                                {{-- <h3>Analyses the following 10 parameters simultaneously</h3> --}}
                                @forelse ($features as $key =>$feature)
                                   {{-- First Section --}}
                                  @if ($key === 0)  
                                
                                <h1 class="title">{{$feature['title']}}</h1>
                                <!--<h2 class="section-title">{{$feature['sub_title']}}</h2>-->
                                      
                                <div class="row mt-4">
                                        <div class="col-md-8 text-content">
                                            {!!$feature['description']!!}
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="image-container-wrapper">
                                                <div class="image-container">
                                                    <img src="{{asset($feature->image)}}" alt="WYS1-718 Device">
                                                </div>
                                                <div class="bubble">
                                                    <div class="tooltip-title">
                                                        Built with Advanced Features
                                                    </div>
                                                    <div class="tooltip-description">
                                                        {!!$feature->image_description!!}
                                                    </div>
                                                </div>
                                                <!--<div class="box-text mt-2">-->
                                                <!--    All functions controlled through Touch Screen, Data output available in RS485, Data can be visualized on cloud.-->
                                                <!--</div> -->
                                            </div>
                                        </div>
                                      </div>
                                 @endif 
                                 {{--static second section --}}
                                 @if ($key===1)
                                  
                                        <div class="row text-center my-4 bordered-section">
                                            <h3 class="text-center">Gear Oil Monitoring System</h3>
                                            <div class="col-md-3">
                                                <h5>Wind Turbine Gear Box Oil</h5>
                                                <div class="image-container">
                                                    <img src="https://quickdemo.in/dev/wrt-india/public/front_assets/images/box1.png" alt="Wind Turbine Gear Box Oil">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="description">
                                                    <p>
                                                        Without Touch Screen, Pump and Controller Output RS485. Output can be taken to any laptop, Desktop, Mobile, and Cloud. External Display Available.<br>
                                                        <strong>Required Flow:</strong> 50ml/minute, <strong>Pressure:</strong> 10 Bar
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>Industrial Gear Box Oil</h5>
                                                <div class="image-container">
                                                    <img src="https://quickdemo.in/dev/wrt-india/public/front_assets/images/box2.png" alt="Industrial Gear Box Oil">
                                                </div>
                                            </div>
                                        </div>
                                   
                                @endif 
                                 {{-- Third Section --}}
                                @if ($key === 2)  
                                <h2 class="section-title">{{$feature->title}}</h2>          
                                <div class="row mt-4">
                                        <div class="col-md-8 text-content">
                                            {!!$feature->description!!}
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="image-container-wrapper">
                                                <div class="image-container">
                                                    <img src="{{asset($feature->image)}}" alt="WYS1-718 Device">
                                                </div>
                                                <div class="bubble">
                                                    <div class="tooltip-title">
                                                        Built with
                                                    </div>
                                                    <div class="tooltip-description">
                                                        {!!$feature->image_description!!}
                                                    </div>
                                                </div>
                                                {{-- <div class="box-text mt-2">
                                                    All functions controlled through Touch Screen. Data output available in RS485. Data can be visualized on cloud.
                                                </div> --}}
                                            </div>
                                        </div>
                                      </div> 
                                @endif
                                @empty
                            
                                @endforelse         
                                <div class="container customization-banner mb-3">
                                    <p>Online oil monitoring system can be customized to your required parameters</p>
                                </div>          

                                <ul class="list-check secondry">
                                    <li>Oil Density</li>
                                    <li>Dynamic Viscosity</li>
                                    <li>Kinetic Viscosity </li>
                                    <li>Temperature</li>
                                    <li>Oil Quality – Dielectric Constant </li>
									<li>Moisture Content in Oil (ppm) </li>
									<li>Water activity</li>
									<li>Free Water in Oil (ppm) </li>
									<li>Oil Particle Count (NAS Value or ISO- User can configure) Particle size: 1, 2, 5, 10, 15, 25, 50, 100μm </li>
									<li>Oil Wear Debris (Fe particles >40~99μm,100~199μm, 200~299μm, 300~399μm, ≥400μm) (Non-Fe particles >150~199μm, 200~299μm, 300~399μm, 400~499μm, ≥500μm)</li>
                                </ul>

								<h3>Built with</h3>

                                <ul class="list-check secondry">
                                    <li><b>7” Touch Screen:</b> The intuitive touch screen interface provides easy navigation and real-time monitoring of key parameters, ensuring user-friendly operation and data visualization.</li>
                                    <li><b>Pump:</b>The integrated pump ensures continuous oil flow through the monitoring system, facilitating accurate readings and consistent performance monitoring.</li>
                                    <li><b>Controller:</b>The centralized controller manages system operations, data collection, and communication protocols, ensuring seamless integration and reliable performance.</li>
                                    <li><b>Computing Card:</b>The high-performance computing card processes real-time data and analytics, providing immediate insights into equipment health and performance.</li>
                                    <li><b>Memory Card:</b>Store data for up to 5 years, enabling historical analysis, trend identification, and long-term performance tracking for informed decision-making and maintenance optimization.</li>
									<li><b>Software with Trends & Analytics: </b>Our advanced software platform offers powerful analytics tools and trend analysis capabilities, allowing you to identify patterns, anomalies, and emerging issues, and make data-driven decisions to optimize maintenance practices and improve equipment reliability.</li>
									<li><b>RS485 Data Output:</b>The RS485 data output interface enables seamless integration with existing monitoring systems, providing flexibility and compatibility with a wide range of equipment and infrastructure.</li>
									<li><b>Cloud Visualization:</b> Access real-time data and analytics from anywhere, anytime, through our cloud-based visualization platform. Stay connected to your equipment and operations, monitor performance metrics, and receive alerts and notifications for timely action and decision-making, ensuring maximum uptime and productivity.</li>
                                </ul>

								<h3>Experience the Future of Maintenance: </h3>
								<p>Transform your maintenance practices and unlock new levels of equipment reliability and performance with our Online Oil Monitoring System. Contact us today to learn more about how our innovative solution can help you optimize maintenance practices, extend equipment lifespan, and maximize productivity for your operations.</p>

                                @elseif($service->visibility_status == 'archived')
                                @foreach ($features as $key => $feature)
                                 
                                   <h1 class="title">{{$feature['title']}}</h1>
                                   {{-- <h2 class="section-title">The only instant onsite grease/oil ferrous analyzer globaly</h2>--}}
                                  
                               
                                <div class="row mt-4">                                  
                                    <div class="col-md-8 text-content">
                                        {!!$feature['description']!!}
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="image-container-wrapper">
                                            <div class="image-container">
                                                <img src="{{asset($feature['image'])}}" alt="{{$feature['title']}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                @endforeach                        
                            @endif
                        </div>
                    </div>
                    
                    {{-- <div class="col-lg-4 col-md-12">
                        <div class="sticky-top m-b30">
                            <form class="inquiry-form inner" id="contact_us_form">
                                <h3 class="title m-t0 m-b10">Let's Convert Your Idea into Reality</h3>
                                <p>Ready to take your business to new heights with Vision Tech? Reach out to us today to learn more about our solutions and begin your transformational journey.
                                </p>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-user text-primary"></i></span>
                                                <input name="first_name" id="first_name" type="text"  class="form-control"  placeholder="First Name">
                                            </div>
                                            <div id="first_name_error" class="text-danger small"></div> <!-- Error message placeholder -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
                                                <input name="mobile" id="mobile" type="text"  class="form-control"  placeholder="Phone">
                                            </div>
                                            <div id="mobile_error" class="text-danger small"></div> <!-- Error message placeholder -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group"> 
                                                <span class="input-group-addon"><i class="ti-email text-primary"></i></span>
                                                <input name="email" id="email" type="email" class="form-control"   placeholder="Your Email Id" >
                                            </div>
                                            <div id="email_error" class="text-danger small"></div> <!-- Error message placeholder -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ti-agenda text-primary"></i></span>
                                                <textarea name="message" id="message" rows="4" class="form-control"  placeholder="Tell us about your project" ></textarea>
                                            </div>
                                            <div id="message_error" class="text-danger small"></div> <!-- Error message placeholder -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="site-button btn-block" > <span>Get A Free Quote!</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>	
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Our Services -->
        <!-- Why Chose Us -->
        
        @if ($service->visibility_status == 'private')
        <div class="section-full bg-gray use-case-pt50 solutions-div pb-4">
            <div class="container">
                <div class="section-head text-left">
                    <h2 class="title">Why Choose Us</h2>
                </div>
    
                <div class="row row-cols-2">
                    @foreach ($whyChooseUs as $key=> $item)
                        <div class="col">
                            <div class="service-box style3 security-box">
                                <div class="icon-bx-wraper radius10 icon-shadow" data-name="{{$key<9? '0': ""}}{{$key+1}}">
                                    <div class="icon-lg">
                                        <a href="javascript:void(0);" class="icon-cell">
                                            <img src="{{asset($item->image)}}" alt="no-image">
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <h2 class="dlab-tilte">{{$item->title}}</h2>
                                        {!!$item->description!!}                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach                  
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0);" class="site-button btnhover13 mx-1 mb-50">
                        Learn More About Our Technology
                    </a>
                </div> 
                 <hr>
            </div>           
        </div>
        <!-- New Section: Industries We Serve -->
        <div class="section-full content-inner bg-gray solutions-div pt-0 pb-2">
            <div class="container">
                <div class="section-head text-left solutions-button">
                    <h2 class="title">Industries We Serve</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p>We cater to a range of industries, including manufacturing, government, semi-government bodies, and the hospitality sector. Whether you’re in steel, power, cement, or garments, our AI solutions are designed to meet your specific needs.</p>
                    </div>

                    <div class="col-md-6">
                        <a href="javascript:void(0);" class="site-button btnhover13 mx-1">
                            See How We Help Your Industry
                        </a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="section-full content-inner bg-gray solutions-div pt-0 pb-4">
            <div class="container">
                <div class="section-head text-left solutions-button">
                    <h2 class="title">Customer Success</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p>Experience our solutions in action with demo videos, and see how we’ve helped companies like yours achieve new levels of efficiency and safety. We also offer a free Proof of Concept (POC) to showcase the potential of our technology in your environment.</p>
                    </div>

                    <div class="col-md-6">
                        <a href="javascript:void(0);" class="site-button btnhover13 mx-1">
                            Watch Demos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($service->visibility_status != 'private')
        <div class="section-full content-inner-1 overlay-black-dark about-8-service bg-img-fix" style="background-image:url('{{asset('front_assets/images/background/bg1.jpg')}}');">
            <div class="container">
                <div class="text-white text-center">
                    <h2 class="title-box m-tb0 max-w800 m-auto">Amazing things happen to your business when we connect those dots of utility and value <span class="bg-primary"></span></h2>
                </div>
            </div>
        </div>
    @endif
        
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

<script>
        $(document).ready(function() {
        $(".image-container img").hover(
            function() {
                $(this).closest(".image-container-wrapper").find(".bubble").fadeIn(200);
            },
            function() {
                $(this).closest(".image-container-wrapper").find(".bubble").fadeOut(200);
            }
        );
    });
</script>

<script>
 document.querySelectorAll('p').forEach(p => {
    if (p.innerHTML.trim() === '&nbsp;') {
        p.style.display = 'none';
    }
});
 
 
 $(document).ready(function() {
    $('.text-content ul').addClass('list-check secondry');
});  
    
</script>

@endsection
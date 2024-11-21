
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="WRT INDIA- Solutions for Industry 4.0 and IIoT" />
	<meta property="og:title" content="WRT INDIA- Solutions for Industry 4.0 and IIoT" />
	<meta property="og:description" content="WRT INDIA- Solutions for Industry 4.0 and IIoT" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- FAVICONS ICON -->
	<link rel="icon" href="{{asset('front_assets/images/favicon.png')}}" type="image/x-icon" />
	<link rel="shortcut icon" type="{{asset('front_assets/image/x-icon')}}" href="images/favicon.png" />
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
	
	<!-- PAGE TITLE HERE -->
	<title>WRT INDIA- Solutions for Industry 4.0 and IIoT</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
		<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/plugins.css')}}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/style.css')}}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{asset('front_assets/css/skin/skin-1.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/templete.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- Google Font -->
	<style>
		.DZ-theme-btn {
			display: none !important;
		}
	    @import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap');
	</style>
	
	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('front_assets/plugins/revolution/revolution/css/revolution.min.css')}}">
	
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-area"></div>
    <!-- header -->
	
    <header class="site-header mo-left header">
		<!-- <div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between align-items-center">
					<div class="dlab-topbar-left">
						<ul>
							<li><a href="javascript:void(0);">About Us</a></li>
							<li><a href="javascript:void(0);">Refund Policy</a></li>
							<li><a href="javascript:void(0);">Help Desk</a></li>
						</ul>
					</div>
					<div class="dlab-topbar-right">
						<a href="javascript:void(0);" class="site-button radius-no">GET A QUOTE</a>						
					</div>
				</div>
			</div>
		</div> -->
		<!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion logo-dark">
						<a href="{{route('front.home')}}"><img src="{{asset('front_assets/images/WRT_Logo.png')}}" alt=""></a>
					</div>
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <button id="quik-search-btn" type="button" class="site-button-link"><i class="la la-search"></i></button>
						</div>
                    </div>
                    <!-- Quik search -->
                    <div class="dlab-quik-search ">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span id="quik-search-remove"><i class="ti-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
						<div class="logo-header d-md-block d-lg-none">
							<a href="index.php"><img src="{{asset('front_assets/images/logo.png')}}" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	
                            <li><a href="{{route('front.home')}}">Home</a></li>
                            <li><a href="{{route('front.about_us')}}">About Us</a></li>
                            <li>
								
								<a href="javascript:;">Products & Services<i class="fas fa-chevron-down"></i></a>
								<ul class="sub-menu right">
									@foreach ($Services as $item)
									   <li><a href="{{route('front.service_by_slug',$item->slug)}}">{{$item->title}}</a></li>										
									@endforeach
                                    {{-- <li><a href="video-security-surveillance.php">Video Security & Surveillance</a></li>
                                    <li><a href="camera-deployment.php">Camera Deployment, Real-Time Monitoring & Traffic Management</a></li>
                                    <li><a href="energy-management-solutions.php">Energy Management Solutions</a></li>
                                    <li><a href="smart-solutions.php">Smart Solutions </a></li>
                                    <li><a href="condition-monitoring.php">Condition Monitoring </a></li>
                                    <li><a href="online-oil-monitoring.php">Online Oil Monitoring</a></li> --}}
								</ul>
							</li>
							<li><a href="{{route('front.contact_us')}}">Contact Us</a></li>
						</ul>
						<div class="dlab-social-icon">
							<ul>
								<li><a class="site-button circle fab fa-facebook-f" href="javascript:void(0);"></a></li>
								<li><a class="site-button  circle fab fa-twitter" href="javascript:void(0);"></a></li>
								<li><a class="site-button circle fab fa-linkedin-in" href="javascript:void(0);"></a></li>
								<li><a class="site-button circle fab fa-instagram" href="javascript:void(0);"></a></li>
							</ul>
						</div>		
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->
      @yield('content')
    <!-- Footer -->
    <footer class="site-footer style1">
        <!-- newsletter part -->
        <!-- <div class="dlab-newsletter">
            <div class="container">
                <div class="ft-contact wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
					<div class="ft-contact-bx">
						<img src="images/icon/icon1.png" alt=""/>
						<h4 class="title">Address</h4>
						<p>Mehta House, 27A Waterloo Street, Kolkata</p>
					</div>
					<div class="ft-contact-bx">
						<img src="images/icon/icon2.png" alt=""/>
						<h4 class="title">Phone</h4>
						<p>8901 Marmora Road Chi Minh City, Vietnam</p>
					</div>
					<div class="ft-contact-bx">
						<img src="images/icon/icon3.png" alt=""/>
						<h4 class="title">Email Contact</h4>
						<p>hello@wrtindia.in</p>
					</div>
				</div>
            </div>
        </div> -->
        <!-- footer top part -->
        <div class="footer-top" style="background-image:url('{{asset('front_assets/images/background/bg2.png')}}'); background-size: contain;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="widget widget_about">
							<h4 class="footer-title">About Industry</h4>
                            <p class="text-justify">At WRT India, we're committed to revolutionizing Industry 4.0 and IIoT technologies for large-scale and heavy industries. With a wealth of expertise, we provide tailored solutions that empower you to meet the challenges of the digital age.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="footer-title">Usefull Link</h4>
                            <ul>
								@foreach ($Services as $services)
                                  <li><a href="{{route('front.service_by_slug',$services->slug)}}">{{$services->title}}</a></li>								
								@endforeach
                                {{-- <li><a href="video-security-surveillance.php">Video Security & Surveillance</a></li>
                                <li><a href="camera-deployment.php">Camera Deployment, Real-Time Monitoring & Traffic Management</a></li>
                                <li><a href="energy-management-solutions.php">Energy Management Solutions</a></li>
                                <li><a href="smart-solutions.php">Smart Solutions </a></li>
                                <li><a href="condition-monitoring.php">Condition Monitoring </a></li>
                                <li><a href="online-oil-monitoring.php">Online Oil Monitoring</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6 footer-col-4">
                        <div class="widget widget_getintuch">
                            <h5 class="m-b30 text-white ">Contact us</h5>
                            <ul>
                                <li><i class="ti-location-pin"></i><strong>address</strong>Mehta House, 27A Waterloo Street, Kolkata</li>
								<li><i class="ti-email"></i><strong>email</strong>hello@wrtindia.in</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-12">
                        <div class="widget widget_subscribe">
                            <h4 class="footer-title">Usefull Link</h4>
							<p>If you have any questions. Subscribe to our newsletter to get our latest products.</p>
                            <form class="dzSubscribe" id="subcriptionFrom" action="" method="post">
								<div class="dzSubscribeMsg"></div>
								<div class="form-group">
									<div class="input-group">
										<input name="email" id="email" required="required" type="email" class="form-control" placeholder="Your Email Address">
										<div class="input-group-addon">
											<button name="submit" value="Submit" type="submit" class="site-button far fa-paper-plane"></button>
										</div>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- footer bottom part -->
        <div class="footer-bottom footer-line">
            <div class="container">
                <div class="footer-bottom-in">
                    <div class="footer-bottom-logo"><a href="index.html">&copy; 2024 wrtindia.in</a></div>
					<div class="footer-bottom-social">
						<ul class="dlab-social-icon dez-border">
							<li><a class="fab fa-facebook-f" href="javascript:void(0);"></a></li>
							<li><a class="fab fa-twitter" href="javascript:void(0);"></a></li>
							<li><a class="fab fa-linkedin-in" href="javascript:void(0);"></a></li>
							<li><a class="fab fa-pinterest-p" href="javascript:void(0);"></a></li>
						</ul>
					</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    <button class="scroltop icon-up" type="button"><i class="fas fa-arrow-up"></i></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{asset('front_assets/js/jquery.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset('front_assets/plugins/wow/wow.js')}}"></script><!-- WOW JS -->

<script src="{{asset('front_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('front_assets/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script><!-- FORM JS -->
<script src="{{asset('front_assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script><!-- FORM JS -->
<script src="{{asset('front_assets/plugins/magnific-popup/magnific-popup.js')}}"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{asset('front_assets/plugins/counter/waypoints-min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{asset('front_assets/plugins/counter/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{asset('front_assets/plugins/imagesloaded/imagesloaded.js')}}"></script><!-- IMAGESLOADED -->
<script src="{{asset('front_assets/plugins/masonry/masonry-3.1.4.js')}}"></script><!-- MASONRY -->
<script src="{{asset('front_assets/plugins/masonry/masonry.filter.js')}}"></script><!-- MASONRY -->
<script src="{{asset('front_assets/plugins/owl-carousel/owl.carousel.js')}}"></script><!-- OWL SLIDER -->
<script src="{{asset('front_assets/plugins/lightgallery/js/lightgallery-all.min.js')}}"></script><!-- Lightgallery -->
<script src="{{asset('front_assets/plugins/scroll/scrollbar.min.js')}}"></script><!-- scroll -->
<script src="{{asset('front_assets/js/custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{asset('front_assets/js/dz.carousel.min.js')}}"></script><!-- SORTCODE FUCTIONS  -->
<script src="{{asset('front_assets/plugins/countdown/jquery.countdown.js')}}"></script><!-- COUNTDOWN FUCTIONS  -->

<script src="{{asset('front_assets/plugins/rangeslider/rangeslider.js')}}" ></script><!-- Rangeslider -->
<script src="{{asset('front_assets/js/jquery.lazy.min.js')}}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{asset('front_assets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{asset('front_assets/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('front_assets/js/rev.slider.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
jQuery(document).ready(function() {
	'use strict';
	dz_rev_slider_2();	
	$('.lazy').Lazy();
});	/*ready*/

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @endif
            @if (session('warning'))
                toastr.warning('{{ session('warning') }}');
            @endif
            @if (session('error'))
                toastr.error('{{ session('error') }}');
            @endif
        });

	$(document).ready(function(){
		$('#subcriptionFrom').submit(function(e){
			e.preventDefault();
			var email = $('#email').val();
			
			$.ajax({
				type: "post",
				url: "{{ $userSubscriptionRoute }}",
				data: {
					email:email
				},
				dataType: "json",
				success: function (response) {
					if(response.success){
						toastr.success(response.message, 'Success');
						$('#email').val('');
					}
				},
				error: function(xhr) {
                // Handle validation or server errors
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errorMessages = '';
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorMessages += value + '<br>';
                    });
                    toastr.error(errorMessages, 'Error'); // Display error messages using toastr
                } else {
                    toastr.error('Something went wrong. Please try again later.', 'Error');
                }
            }
			});
		});
	});
</script>
@yield('customJs')
</body>
</html>
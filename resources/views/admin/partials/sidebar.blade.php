<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('front.home')}}" class="brand-link">
        <img src="{{asset('admin_assets/img/wrt.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WRT INDIA</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item {{request()->routeIs('admin.dashboard')? 'active': ''}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->routeIs('admin.dashboard')? 'active': ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>																
                </li>
                <li class="nav-item {{request()->routeIs('service_management.*')? 'active': ''}}">
                    <a href="{{route('service_management.list.all')}}" class="nav-link {{request()->routeIs('service_management.*')? 'active': ''}}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Service Management                       
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('why_choose_us.*')? 'active': ''}}">
                    <a href="{{route('why_choose_us.list.all')}}" class="nav-link {{request()->routeIs('why_choose_us.*')? 'active': ''}}">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>
                           Why Choose Us(Vision)                
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('about_us.*')? 'active': ''}}">
                    <a href="{{route('about_us.list.all')}}" class="nav-link {{request()->routeIs('about_us.*')? 'active': ''}}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                           About Us               
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('key_highlights.*')? 'active': ''}}">
                    <a href="{{route('key_highlights.list.all')}}" class="nav-link {{request()->routeIs('key_highlights.*')? 'active': ''}}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Key Highlights             
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('why_choose_wrt.*')? 'active': ''}}">
                    <a href="{{route('why_choose_wrt.list.all')}}" class="nav-link {{request()->routeIs('why_choose_wrt.*')? 'active': ''}}">
                        <i class="nav-icon fas fa-medal"></i>
                        <p>
                            Why Choose WRT       
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('admin.website-settings.index')? 'active' :''}}">
                    <a href="{{route('admin.website-settings.index')}}" class="nav-link {{request()->routeIs('admin.website-settings.index')? 'active' :''}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Website Settings</p>
                    </a>
                </li>
                   {{-- <li class="nav-item">
                    <a href="brands.html" class="nav-link">
                        <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                          </svg>
                        <p>Brands</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="products.html" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Products</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <!-- <i class="nav-icon fas fa-tag"></i> -->
                        <i class="fas fa-truck nav-icon"></i>
                        <p>Shipping</p>
                    </a>
                </li>							
                <li class="nav-item">
                    <a href="orders.html" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="discount.html" class="nav-link">
                        <i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
                        <p>Discount</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="users.html" class="nav-link">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages.html" class="nav-link">
                        <i class="nav-icon  far fa-file-alt"></i>
                        <p>Pages</p>
                    </a>
                </li>							 --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside>
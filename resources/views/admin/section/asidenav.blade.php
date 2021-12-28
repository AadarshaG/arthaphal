<div class="page-wrapper">
    <!-- START HEADER-->
    <header class="header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <div class="page-brand">
            <a class="link" href="">
                    <span class="brand"><h3>Arthafal</h3>
                    </span>
            </a>
        </div>
        <div class="flexbox flex-1">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                </li>
            </ul>
            <!-- END TOP-LEFT TOOLBAR-->
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        <!--//<img src="" />-->
                        <span></span>Arthafal</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </div>
    </header>
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    <nav class="page-sidebar" id="sidebar">
        <div id="sidebar-collapse">
            <div class="admin-block d-flex">
                <div>
                    <!--<img src="" width="45px" />-->
                </div>
                <div class="admin-info">
                    <div class="font-strong">Arthafal</div>
                    <small>Admin</small></div>
            </div>
            <ul class="side-menu metismenu">
                <li>
                    <a class="active" href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="heading">FEATURES</li>
                <li>
                    <a href="{{route('logo.index')}}"><i class="sidebar-item-icon fa fa-puzzle-piece"></i>
                        <span class="nav-label"> LOGO</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('about.index')}}"><i class="sidebar-item-icon fa fa-home"></i>
                        <span class="nav-label"> About Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('slider.index')}}"><i class="sidebar-item-icon fa fa-sliders"></i>
                        <span class="nav-label"> Home Banner</span>
                    </a>
                </li>
                <li class="dropdown"><a href="" class="collapsed" data-toggle="collapse" data-target="#service">
                        <i class="sidebar-item-icon fa fa-adjust"></i><span class="nav-label">Services</span><i class="fa fa-angle-left arrow"></i></a>
                    <div  class="collapse" id="service">
                        <ul>
                            <li>
                                <a href="{{route('service.index')}}"><i class="sidebar-item-icon"></i>
                                    <span class="nav-label">Services</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('servicepdf.index')}}"><i class="sidebar-item-icon"></i>
                                    <span class="nav-label">Services PDF</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown"><a href="" class="collapsed" data-toggle="collapse" data-target="#download">
                        <i class="sidebar-item-icon fa fa-adjust"></i><span class="nav-label">Downloads</span><i class="fa fa-angle-left arrow"></i></a>
                    <div  class="collapse" id="download">
                        <ul>
                            <li>
                                <a href="{{route('category.index')}}"><i class="sidebar-item-icon"></i>
                                    <span class="nav-label">Document Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('document.index')}}"><i class="sidebar-item-icon"></i>
                                    <span class="nav-label">Document PDF</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown"><a href="" class="collapsed" data-toggle="collapse" data-target="#plan">
                        <i class="sidebar-item-icon fa fa-adjust"></i><span class="nav-label">Service Plans</span><i class="fa fa-angle-left arrow"></i></a>
                    <div  class="collapse" id="plan">
                        <ul>
                            <li>
                                <a href="{{route('product.index')}}"><i class="sidebar-item-icon"></i>
                                    <span class="nav-label">Service Plan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('planpdf.index')}}"><i class="sidebar-item-icon"></i>
                                    <span class="nav-label">Plan PDF</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('blog.index')}}"><i class="sidebar-item-icon fa fa-bold"></i>
                        <span class="nav-label"> Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('link.index')}}"><i class="sidebar-item-icon fa fa-link"></i>
                        <span class="nav-label"> Social Links</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('contact.index')}}"><i class="sidebar-item-icon fa fa-phone"></i>
                        <span class="nav-label"> Contact Info</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('policy.index')}}"><i class="sidebar-item-icon fa fa-product-hunt"></i>
                        <span class="nav-label">Policies</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END SIDEBAR-->

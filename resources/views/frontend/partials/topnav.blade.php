<header class="header_area">
    <div class="sub_header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 col-xl-6">
                    <div id="logo">
                        <a href="#"><img src="{{asset('/img/bagbag_logo.jpg')}}" style="width:12%;height:12%"/></a>
                    </div>
                </div>
                <div class="col-md-8 col-xl-6">
                    <div class="sub_header_social_icon float-right">
                        <a href="#"><i class="flaticon-phone"></i>+632 413-2002</a>
                        @if (Auth::guest())
                            <a href="{{url('/')}}" class="register_icon"><i class="ti-arrow-right"></i>LOGIN</a>
                        @else
                        <div style="display:inline-flex">
                            <a href="{{ route('logout') }}" class="register_icon"  
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="ti-arrow-right" ></i>LOGOUT</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> --}}

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link active" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Mission & Vission</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Announcement</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Schools</a>
                                </li>
                                @if (Auth::guest())
                                
                                @else
                                    <li class="nav-item">
                                            <a href="{{url('barangay/queue')}}" class="nav-link" style="color:#ff8b23"><b>Queue</b></a>
                                    </li>
                                @endif
                           
                            </ul>
                            <div class="header_social_icon d-none d-lg-block">
                                <ul>
                                    @if (Auth::guest())
                                    
                                    @else
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label>Welcome, {{Auth::user()->firstname . ' ' . Auth::user()->surname}}</label>&nbsp&nbsp
                                    @endif
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li>
                                        <a href="#"> <i class="ti-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    <li><a href="#"><i class="ti-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
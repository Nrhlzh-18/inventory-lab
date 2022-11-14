<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Index</title>
    <link href="assetsz/css/login.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assetsz/bootstrap/css/bootstrap.min.css')}}"><link href="{{asset('assetsz/css/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="{{asset('assetsz/css/Corporate-Footer-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('assetsz/css/Footer-with-social-media-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assetsz/css/vanilla-zoom.min.css')}}">
    <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
</head>
<body>


	<nav class="navbar navbar-light navbar-expand-sm fixed-top bg-white clean-navbar">
        <div class="container">
            <a class="navbar-brand logo" href="#">
                <img src="assetsz/img/logoo.png" style="height: 50px;">
            </a>
           <button class="navbar-toggler close" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/about">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Layanan</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="">
                            <li><a class="dropdown-item" href="/pengujian">Layanan Pengujian</a></li>
                            <li><a class="dropdown-item" href="/sarana">Sarana dan Prasarana</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="/contact">Contact us</a></li>
                    <li class="nav-item">
                        <button type="button" class="btn mb-2 mr-2 btn-success" data-toggle="modal" data-target="#loginModal">
                            <strong style="color: white">LOGIN</strong>
                        </button>
                    </li>

                </ul>
                
            </nav>
    
    <!--Container Main start-->
      	@yield('content')
        @include('sweetalert::alert')

    <footer id="footerpad" style="background: rgb(225,225,225);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-8 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://twitter.com/Lablingkkabbog1">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/lablingkdlhkabbogor/">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="mailto:lablingkkabbogor@yahoo.co.id">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted text-center" style="font-family: roboto, sans-serif;">JL.H. Jairan No.9 <br> Kelurahan Pekansari Kecamatan Cibinong-16914 Kabupaten Bogor</p>
                    <p class="copyright text-muted text-center fw-bold">Copyright &copy; 2022 </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('assetsz/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="assetsz/js/blog.js"></script>
    <script src="{{asset('assetsz/js/bs-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="{{asset('assetsz/js/vanilla-zoom.js')}}"></script>
    <script src="{{asset('assetsz/js/theme.js')}}"></script>
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
</body>
</html>

<!-- Modal -->
    		<div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header" id="loginModalLabel">
                    		<h4 class="modal-title">Login</h4>
                    		<button class="close" data-dismiss="modal" aria-hidden="true" style="border-width: 0px;background-color: transparent;font-size: 20px;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
                   			</button>
                		</div>
                		<div class="modal-body">
                    		<form class="mt-0" action="{{route('login')}}" name="login" method="POST">
                        	@csrf
                        		<div class="form-group">
                            		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                		<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                		<circle cx="12" cy="7" r="4"></circle>
                            		</svg>
                            		<input type="email" name="email" class="form-control mb-2" id="exampleInputEmail1" placeholder="Email">
                        		</div>
                        		<div class="form-group">
                            		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                		<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                		<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            		</svg>
                            		<input type="password" name="password" class="form-control mb-4" id="exampleInputPassword1" placeholder="Password">
                        		</div>
                        		<button name="login" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Login</button>
                    		</form>
                		</div>
            		</div>
        		</div>
    		</div>
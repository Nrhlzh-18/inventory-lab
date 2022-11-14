@extends('auth.bar')

@section('content')

    <main class="page landing-page">
        <header>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assetsz/img/banner1.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assetsz/img/banner2.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assetsz/img/banner3.png')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> 
            </div>
        </header>
        <section id="about" class="clean-block">
            <div class="container">
                <div class="block-heading">
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img style="width: 100%;" src="{{asset('assetsz/img/hi.png')}}">
                    </div>
                    <div class="col-md-6">
                        <h3 style="font-family: Poppins, sans-serif;font-weight: bold;">Seputar UPT</h3>
                        <div class="getting-started-info">
                            <p>UPT LABORATORIUM LINGKUNGAN, dibentuk berdasarkan Keputusan Bupati Bogor No. 70 Tahun 2008 tentang pembentukan Organisasi dan Tata Kerja Unit Pelaksana Teknis (UPT) Laboratorium Lingkungan pada Badan Lingkungan Hidup Kabupaten Bogor.<br><a href="/about">read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section id="news" class="clean-block">
            <div class="container">
                <div class="block-heading">
                </div>
                
            </div>
        </section> -->
        <section id="portfolio" class="p-0">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-sm-6 col-lg-4">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{asset('assetsz/img/pengujianUdara.jpg')}}" alt="">
                            <div class="overlay">
                                <h2></h2>
                                <p>Pengujian Sampling Udara Ambien</p>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{asset('assetsz/img/pengambilanSempelAir.jpg')}}" alt="">
                            <div class="overlay">
                                <h2></h2>
                                <p>Pengambilan Sampel Air Limbah Perusahaan</p>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{asset('assetsz/img/pengujian(1).jpg')}}" alt="" >
                            <div class="overlay">
                                <h2></h2>
                                <p>Pengujian Sampling Udara Ambien</p>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        
    </main>

    
@endsection

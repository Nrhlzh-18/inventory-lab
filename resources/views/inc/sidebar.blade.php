@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN TOPBAR  -->
    <div class="topbar-nav header navbar" role="banner">
        <nav id="topbar">
            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="{{asset('assetsz/img/logoo.png')}}" style="width: 150px;" >
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="index.html" class="nav-link"></a>
                </li>
            </ul>

            <ul class="list-unstyled menu-categories" id="topAccordion">
                
                @if ($page_name != 'alt_menu' && $page_name != 'blank_page' && $page_name != 'boxed' && $page_name != 'breadcrumb' )

                <li class="menu single-menu  {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Dashboard</span> 
                        </div>
                    </a>
                </li>

                @if(auth()->user()->role == "kepala")
                <li class="menu single-menu  {{ ($category_name === 'user') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
                            <span>User</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'bahan') ? 'active' : '' }}">
                    <a href="{{route('bahan.index')}}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M15 9.783V4h1V2H8v2h1v5.783l-4.268 9.389a1.992 1.992 0 0 0 .14 1.911A1.99 1.99 0 0 0 6.553 22h10.895a1.99 1.99 0 0 0 1.681-.917c.37-.574.423-1.289.14-1.911L15 9.783zm-4.09.631c.06-.13.09-.271.09-.414V4h2v6c0 .143.03.284.09.414L15.177 15H8.825l2.085-4.586z"></path></svg>
                            <span>Bahan</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'layanan') ? 'active' : '' }}">
                    <a href="{{ route('layanan.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>Layanan</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'pengajuanLayanan') ? 'active' : '' }} {{ ($category_name === 'bahanPengajuan') ? 'active' : '' }}">
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            <span>Form Pengajuan</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                        <li class="{{ ($category_name === 'pengajuanLayanan') ? 'active' : '' }}">
                            <a href="/pengajuanLayanan/create"> Pengajuan Layanan</a>
                        </li>
                        <li class="{{ ($category_name === 'bahanPengajuan') ? 'active' : '' }}">
                            <a href="{{ route('bahanPengajuan.create') }}"> Pengajuan Bahan </a>
                        </li>
                    </ul>
                </li>

                <li class="menu single-menu {{ ($category_name === 'verifikasiLayanan') ? 'active' : '' }} {{ ($category_name === 'verifikasiBahan') ? 'active' : '' }}">
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M3 11h8V3H3zm2-6h4v4H5zM3 21h8v-8H3zm2-6h4v4H5zm8-12v8h8V3zm6 6h-4V5h4zm-5.99 4h2v2h-2zm2 2h2v2h-2zm-2 2h2v2h-2zm4 0h2v2h-2zm2 2h2v2h-2zm-4 0h2v2h-2zm2-6h2v2h-2zm2 2h2v2h-2z"></path></svg>
                            <span>Verifikasi</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                        <li class="{{ ($category_name === 'verifikasiLayanan') ? 'active' : '' }}">
                            <a href="{{ route('verifikasiLayanan.index') }}"> Verifikasi Layanan</a>
                        </li>
                        <li class="{{ ($category_name === 'verifikasiBahan') ? 'active' : '' }}">
                            <a href="{{ route('verifikasiBahan.index') }}"> Verifikasi Bahan </a>
                        </li>
                    </ul>
                </li>
                @endif
                
                @if(auth()->user()->role == "subag")
                <li class="menu single-menu  {{ ($category_name === 'user') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
                            <span>User</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'bahan') ? 'active' : '' }}">
                    <a href="{{route('bahan.index')}}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M15 9.783V4h1V2H8v2h1v5.783l-4.268 9.389a1.992 1.992 0 0 0 .14 1.911A1.99 1.99 0 0 0 6.553 22h10.895a1.99 1.99 0 0 0 1.681-.917c.37-.574.423-1.289.14-1.911L15 9.783zm-4.09.631c.06-.13.09-.271.09-.414V4h2v6c0 .143.03.284.09.414L15.177 15H8.825l2.085-4.586z"></path></svg>
                            <span>Bahan</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'layanan') ? 'active' : '' }}">
                    <a href="{{ route('layanan.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>Layanan</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'pengajuanLayanan') ? 'active' : '' }} {{ ($category_name === 'bahanPengajuan') ? 'active' : '' }}">
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            <span>Form Pengajuan</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                        <li class="{{ ($category_name === 'pengajuanLayanan') ? 'active' : '' }}">
                            <a href="/pengajuanLayanan/create"> Pengajuan Layanan</a>
                        </li>
                        <li class="{{ ($category_name === 'bahanPengajuan') ? 'active' : '' }}">
                            <a href="{{ route('bahanPengajuan.create') }}"> Pengajuan Bahan </a>
                        </li>
                    </ul>
                </li>

                <li class="menu single-menu {{ ($category_name === 'verifikasiLayanan') ? 'active' : '' }} {{ ($category_name === 'verifikasiBahan') ? 'active' : '' }}">
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M3 11h8V3H3zm2-6h4v4H5zM3 21h8v-8H3zm2-6h4v4H5zm8-12v8h8V3zm6 6h-4V5h4zm-5.99 4h2v2h-2zm2 2h2v2h-2zm-2 2h2v2h-2zm4 0h2v2h-2zm2 2h2v2h-2zm-4 0h2v2h-2zm2-6h2v2h-2zm2 2h2v2h-2z"></path></svg>
                            <span>Verifikasi</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                        <li class="{{ ($category_name === 'verifikasiLayanan') ? 'active' : '' }}">
                            <a href="{{ route('verifikasiLayanan.index') }}"> Verifikasi Layanan</a>
                        </li>
                        <li class="{{ ($category_name === 'verifikasiBahan') ? 'active' : '' }}">
                            <a href="{{ route('verifikasiBahan.index') }}"> Verifikasi Bahan </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(auth()->user()->role == "analis")
                <li class="menu single-menu {{ ($category_name === 'pengajuanLayanan') ? 'active' : '' }}">
                    <a href="/pengajuanLayanan/create">
                        <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M22 8a.76.76 0 0 0 0-.21v-.08a.77.77 0 0 0-.07-.16.35.35 0 0 0-.05-.08l-.1-.13-.08-.06-.12-.09-9-5a1 1 0 0 0-1 0l-9 5-.09.07-.11.08a.41.41 0 0 0-.07.11.39.39 0 0 0-.08.1.59.59 0 0 0-.06.14.3.3 0 0 0 0 .1A.76.76 0 0 0 2 8v8a1 1 0 0 0 .52.87l9 5a.75.75 0 0 0 .13.06h.1a1.06 1.06 0 0 0 .5 0h.1l.14-.06 9-5A1 1 0 0 0 22 16V8zm-10 3.87L5.06 8l2.76-1.52 6.83 3.9zm0-7.72L18.94 8 16.7 9.25 9.87 5.34zM4 9.7l7 3.92v5.68l-7-3.89zm9 9.6v-5.68l3-1.68V15l2-1v-3.18l2-1.11v5.7z"></path>
                        </svg>                         
                        <span>Form Pengajuan Layanan</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'bantuan') ? 'active' : '' }}">
                    <a href="{{route('verifikasiLayanan.index')}}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M3 11h8V3H3zm2-6h4v4H5zM3 21h8v-8H3zm2-6h4v4H5zm8-12v8h8V3zm6 6h-4V5h4zm-5.99 4h2v2h-2zm2 2h2v2h-2zm-2 2h2v2h-2zm4 0h2v2h-2zm2 2h2v2h-2zm-4 0h2v2h-2zm2-6h2v2h-2zm2 2h2v2h-2z"></path></svg>
                            <span>Verifikasi</span>
                        </div>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role == "verifikator")
                <li class="menu single-menu {{ ($category_name === 'bahan') ? 'active' : '' }}">
                    <a href="{{route('bahan.index')}}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M15 9.783V4h1V2H8v2h1v5.783l-4.268 9.389a1.992 1.992 0 0 0 .14 1.911A1.99 1.99 0 0 0 6.553 22h10.895a1.99 1.99 0 0 0 1.681-.917c.37-.574.423-1.289.14-1.911L15 9.783zm-4.09.631c.06-.13.09-.271.09-.414V4h2v6c0 .143.03.284.09.414L15.177 15H8.825l2.085-4.586z"></path></svg>
                            <span>Bahan</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'layanan') ? 'active' : '' }}">
                    <a href="{{ route('layanan.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>Layanan</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'pengajuanLayanan') ? 'active' : '' }} {{ ($category_name === 'bahanPengajuan') ? 'active' : '' }}">
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            <span>Pengajuan Penambahan Bahan</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                        <li class="{{ ($category_name === 'bahanPengajuan') ? 'active' : '' }}">
                            <a href="/bahanPengajuan/create">Form Pengajuan Bahan</a>
                        </li>
                        <li class="{{ ($category_name === 'verifikasiBahan') ? 'active' : '' }}">
                            <a href="{{ route('verifikasiBahan.index') }}">Status Verifikasi</a>
                        </li>
                    </ul>
                </li>
                <li class="menu single-menu {{ ($category_name === 'verifikasi') ? 'active' : '' }}">
                    <a href="{{ route('verifikasiLayanan.index') }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M3 11h8V3H3zm2-6h4v4H5zM3 21h8v-8H3zm2-6h4v4H5zm8-12v8h8V3zm6 6h-4V5h4zm-5.99 4h2v2h-2zm2 2h2v2h-2zm-2 2h2v2h-2zm4 0h2v2h-2zm2 2h2v2h-2zm-4 0h2v2h-2zm2-6h2v2h-2zm2 2h2v2h-2z"></path></svg>
                            <span>Verifikasi Layanan</span>
                        </div>
                    </a>
                </li>
                @endif

                @else
                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Menu 1</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu1" data-parent="#topAccordion">
                        <li>
                            <a href="javascript:void(0);"> Submenu 1 </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Submenu 2 </a>
                        </li>
                    </ul>
                </li>


                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            <span>Menu 2</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu2" data-parent="#topAccordion">
                        <li>
                            <a href="javascript:void(0);"> Submenu 1 </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Submenu 2 </a>
                        </li>
                        <li class="sub-sub-submenu-list">
                            <a href="#sub-sub-category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Submenu 3 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu" id="sub-sub-category" data-parent="#menu"> 
                                <li>
                                    <a href="javascript:void(0);"> Sub-Submenu 1 </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> Sub-Submenu 2 </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> Sub-Submenu 3 </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu single-menu active">
                    <a href="#starter-kit" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle autodroprown">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                            <span>Starter Kit</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="starter-kit" data-parent="#topAccordion">
                        <li class="{{ ($category_name === 'blank_page') ? 'active' : '' }}">
                            <a href="/starter-kit/blank_page"> Blank Page </a>
                        </li>
                        <li class="{{ ($category_name === 'breadcrumbs') ? 'active' : '' }}">
                            <a href="/starter-kit/breadcrumbs"> Breadcrumb </a>
                        </li>
                    </ul>
                </li>
                
                @endif
            </ul>
        </nav>
    </div>
    <!--  END TOPBAR  -->

@endif
@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header><img src="{{ asset('assetsz/img/atas.png') }}" style="width: 100%;"></header>
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>

            <div class="nav-logo">
                <img src="{{asset('assetsz/img/logoo.png')}}" style="width: 120px;">
            </div>

            @if ($category_name != 'starter_kits')
            <ul class="navbar-item flex-row mr-auto">
                <li class="nav-item align-self-center search-animated">
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </li>
            </ul>
            @endif

            <ul class="navbar-item flex-row nav-dropdowns {{ ($category_name === 'starter_kits') ? 'ml-auto' : '' }}">
                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            @if(!auth()->user()->foto)
                                <img alt="photo profile" class="img-fluid" src="{{asset('storage/profil/90x90.jpg')}}">
                            @else 
                                <img alt="photo profile" class="img-fluid" src="{{ asset( "storage/". auth()->user()->foto ) }}">
                            @endif
                            {{-- <img src="{{asset('storage/profil/90x90.jpg')}}" class="img-fluid"> --}}
                            <div class="media-body align-self-center">
                                <h6><span>Hi, {{ auth()->user()->name }}</span></h6>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a href="#profile" data-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> My Profile
                                </a>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{ route('signOut') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Sign Out
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('signOut') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

@endif

<!-- MODAL PROFILE -->
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="profile" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" style="text-align: right;">
                    <a href="#modalEdit{{ auth()->user()->id }}" class="edit-profile margin-right" data-toggle="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>                     
                    </a>
                    
                </div>
                <div class="text-center user-info">
                    @if(!auth()->user()->foto)
                        <img alt="photo profile" class="img-fluid" src="{{asset('storage/profil/90x90.jpg')}}">
                    @else 
                        <img alt="photo profile" class="img-fluid" src="{{ asset( "storage/". auth()->user()->foto ) }}">
                    @endif
                    <p class="" style="color: black;">{{ auth()->user()->name }} </p>
                </div>
                <div class="user-info-list" style="text-align: center;">
                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            <li class="contacts-block__item">
                                {{ auth()->user()->role }}
                            </li>
                        </ul>
                    </div>                                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PROFILE -->
<!-- MODAL EDIT DATA -->
<div class="modal fade" id="modalEdit{{ auth()->user()->id }}" tabindex="-1" aria-labelledby="modalEditBarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Photo Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Photo</label>
                        @if (auth()->user()->foto)
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" class="img-preview img-fluid mb-3 col-sm-5">
                        @else                           
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                            <input name="foto" class="form-control" type="file" id="image" name="image" onchange="previewImages()">      
                    </div>
                    <div class="input-group">
                        <button class="btn btn-success rounded me-1" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END EDIT DATA -->
<style type="text/css">
    .user-info {
        margin-top: 40px;
    }
    .user-info img {
        border-radius: 9px;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);
    }
    .user-info p {
  font-size: 20px;
  font-weight: 600;
  margin-top: 22px;
  color: #1b55e2;
}
.user-info-list ul.contacts-block {
  border: none;
  max-width: 217px;
  margin: 36px auto;
}
.user-info-list ul.contacts-block li {
  margin-bottom: 13px;
  font-weight: 600;
  font-size: 13px;
}
.user-info-list ul.contacts-block li a {
  font-weight: 600;
  font-size: 15px;
  color: #1b55e2;
}
.user-info-list ul.contacts-block svg {
  width: 21px;
  margin-right: 15px;
  color: #888ea8;
  vertical-align: middle;
  fill: rgba(0, 23, 55, 0.08);
}
.user-info-list ul.contacts-block li:hover svg {
  color: #1b55e2;
  fill: rgba(27, 85, 226, 0.2392156863);
}
.user-info-list ul.contacts-block ul.list-inline {
  margin: 27px auto;
}
.user-info-list ul.contacts-block ul.list-inline div.social-icon {
  border: 2px solid #e0e6ed;
  border-radius: 50%;
  height: 35px;
  width: 35px;
  display: flex;
  justify-content: center;
  align-self: center;
}
.user-info-list ul.contacts-block ul.list-inline svg {
  margin-right: 0;
  color: #1b55e2;
  width: 19px;
  align-self: center;
}
</style>
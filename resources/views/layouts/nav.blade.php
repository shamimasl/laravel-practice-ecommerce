<div class="sl-logo"><a href="{{ url('home') }}"> {{ env('APP_NAME') }}</a></div>
<div class="sl-sideleft">
    <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
            <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Menus</label>
    <div class="sl-sideleft-menu">
        <a href="{{ url('home') }}" class="sl-menu-link @yield('dashboard')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        @if (Auth::user()->role == 2)
            <a href="{{ url('category') }}" class="sl-menu-link @yield('category')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Category</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ url('subcategory') }}" class="sl-menu-link @yield('subcategory')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Sub Category</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ url('product') }}" class="sl-menu-link @yield('product')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Product</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ url('coupon') }}" class="sl-menu-link @yield('coupon')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Coupon</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ url('newsletter') }}" class="sl-menu-link @yield('newsletter')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Newsletter</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ url('client/message') }}" class="sl-menu-link @yield('message')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Client Message</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{ url('footer/info') }}" class="sl-menu-link @yield('info')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Footer Info</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
        @endif
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name">{{ Auth::user()->name }}<span class="hidden-md-down"> </span></span>
                    <img src="{{ asset('uploads/profile_photos') }}/{{ Auth::user()->profile_photo }}"
                        class="wd-32 rounded-circle" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="{{ url('profile') }}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a>
                        </li>

                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                    class="icon ion-power "></i> Sign Out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>

    </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
{{-- <div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link">
                    <div class="media">
                        <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                            <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                            <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire
                                soul, like these sweet mornings of spring.</p>
                        </div>
                    </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link">
                    <div class="media">
                        <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                            <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                            <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link">
                    <div class="media">
                        <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                            <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                            <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the
                                present moment...</p>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link">
                    <div class="media">
                        <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                            <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                            <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me,
                                and the meridian sun strikes...</p>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link">
                    <div class="media">
                        <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                            <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                            <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire
                                soul, like these sweet mornings of spring.</p>
                        </div>
                    </div><!-- media -->
                </a>
            </div><!-- media-list -->
            <div class="pd-15">
                <a href=""
                    class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View
                    More Messages</a>
            </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth
                                    Bungaos</strong> tagged you and 18 others in a post.</p>
                            <span class="tx-12">October 03, 2017 8:45am</span>
                        </div>
                    </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa
                                    Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The
                                    Social Network</strong></p>
                            <span class="tx-12">October 02, 2017 12:44am</span>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong
                                    class="tx-medium tx-gray-800">Sale Group</strong></p>
                            <span class="tx-12">October 01, 2017 10:20pm</span>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius
                                    Erving</strong> wants to connect with you on your conversation with <strong
                                    class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                            <span class="tx-12">October 01, 2017 6:08pm</span>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth
                                    Bungaos</strong> tagged you and 12 others in a post.</p>
                            <span class="tx-12">September 27, 2017 6:45am</span>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong
                                    class="tx-medium tx-gray-800">Sale Group</strong></p>
                            <span class="tx-12">September 28, 2017 11:30pm</span>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa
                                    Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The
                                    Great Pyramid</strong></p>
                            <span class="tx-12">September 26, 2017 11:01am</span>
                        </div>
                    </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius
                                    Erving</strong> wants to connect with you on your conversation with <strong
                                    class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                            <span class="tx-12">September 23, 2017 9:19pm</span>
                        </div>
                    </div><!-- media -->
                </a>
            </div><!-- media-list -->
        </div><!-- #notifications -->

    </div><!-- tab-content -->
</div><!-- sl-sideright --> --}}
<!-- ########## END: RIGHT PANEL ########## --->

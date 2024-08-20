


<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!-- User details -->


    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{ route('dashboard') }}" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if(Auth::user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-home"></i>
                    <span>Home Slide Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('home.slide') }}">Home Slide</a></li>

                </ul>
            </li>
            @endif
            @if(Auth::user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fab fa-blogger-b"></i>
                    <span>Users</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.users') }}">All Users</a></li>
                    <li><a href="{{ route('add.user') }} ">Add User</a></li>

                </ul>
            </li>
            @endif

            @if(Auth::user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class=" fas fa-info-circle"></i>
                    <span>About Page Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('about.page') }}">About Page</a></li>
                    <li><a href="{{ route('about.multi.image') }}">Brands Multi Images</a></li>
                    <li><a href="{{ route('all.multi.image') }}">All Brands Images</a></li>

                </ul>
            </li>
            @endif
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="far fa-folder-open"></i>
                    <span>Portfolio Page Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.portfolio') }}">All Portfolio</a></li>
                    <li><a href="{{ route('add.portfolio') }} ">Add Portfolio</a></li>

                </ul>
            </li>

            @if(Auth::user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fab fa-blogger-b"></i>
                    <span>Blog Category Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog.category') }}">All Blog Category</a></li>
                    <li><a href="{{ route('add.blog.category') }} ">Add Blog Category</a></li>

                </ul>
            </li>
            @endif



            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fab fa-blogger-b"></i>
                    <span>Blog Page Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.blog') }}">All Blog</a></li>
                    <li><a href="{{ route('add.blog') }} ">Add Blog</a></li>

                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fab fa-blogger-b"></i>
                    <span>Youtube Share's</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.youtube') }}">All YouTube Shares</a></li>
                    <li><a href="{{ route('add.youtube') }} ">Add YouTube Post</a></li>

                </ul>
            </li>

            @if(Auth::user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-pen-square"></i>
                    <span>Team Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.team') }}">All Team Members</a></li>
                    <li><a href="{{ route('add.team') }} ">Add Team Member</a></li>

                </ul>
            </li>
            @endif

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-pen-square"></i>
                    <span>Sitemap Pages URL</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('all.pages') }}">All Sitemap URL</a></li>
                    <li><a href="{{ route('add.pages') }} ">Add Sitemap URL</a></li>

                </ul>
            </li>

            @if(Auth::user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-pen-square"></i>
                    <span>Footer Section Setup</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('footer.setup') }}">Footer Setup</a></li>


                </ul>
            </li>
            @endif

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-message-line"></i>
                    <span>Contact Message</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('contact.message') }}">Contact Message</a></li>


                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-pen-square"></i>
                    <span>Subscribers</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('subscriber.email') }}">Subscribers</a></li>


                </ul>
            </li>








        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>

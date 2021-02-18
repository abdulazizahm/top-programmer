<div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo" >
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ route('admin.home') }}" class="text-sm text-gray-700 underline" style="font-size: 25px"><span class="material-icons">face</span> {{auth()->user()->name}}</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><span class="material-icons">login</span>Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  {{null==request()->segment(2)?'active':''}} ">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Home Page</p>
                </a>
            </li>
            <li class="nav-item {{is_active('users')}}">
                <a class="nav-link " href="{{route('users.index')}}" >
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{is_active('categories')}}">
                <a class="nav-link " href="{{route('categories.index')}}" >
                    <i class="material-icons">content_paste</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{is_active('skills')}}">
                <a class="nav-link" href="{{route('skills.index')}}" >
                    <i class="material-icons">bubble_chart</i>
                    <p>Skills</p>
                </a>
            </li>
            <li class="nav-item {{is_active('tags')}}">
                <a class="nav-link" href="{{route('tags.index')}}" >
                    <i class="material-icons">library_books</i>
                    <p>Tags</p>
                </a>
            </li>
            <li class="nav-item {{is_active('pages')}}">
                <a class="nav-link" href="{{route('pages.index')}}" >
                    <i class="material-icons">library_books</i>
                    <p>Pages</p>
                </a>
            </li>
            <li class="nav-item {{is_active('videos')}}">
                <a class="nav-link" href="{{route('videos.index')}}" >

                    <i class="material-icons icon-image-preview">video_library</i>
                    <p>Videos</p>
                </a>
            </li>
            <li class="nav-item {{is_active('messages')}}">
                <a class="nav-link" href="{{route('messages.index')}}" >
                    <i class="material-icons icon-image-preview">video_library</i>
                    <p>Messages</p>
                </a>
            </li>
        </ul>
    </div>
</div>

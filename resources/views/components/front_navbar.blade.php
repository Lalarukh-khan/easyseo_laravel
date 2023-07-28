 <header class="top-header">
    <nav class="navbar navbar-expand nwnavbar">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="nwnavtitle">
            {!! $title !!}
        </div>
        <div class="flex-grow-1 search-bar">
            {{-- <div class="input-group">
                 <button class="btn btn-search-back search-arrow-back" type="button"><i class="bx bx-arrow-back"></i></button>
                 <input type="text" class="form-control" placeholder="search" />
                 <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i></button>
            </div> --}}
        </div>
        <div class="right-topbar ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="d-flex user-box align-items-center">
                            <div class="user-info">
                                <p class="user-name mb-0 nwuser-name">{{auth('web')->user()->name}} </p>
                            </div>
                            <img src="{{asset(check_file(auth('web')->user()->image,'user'))}}" class="user-img"
                                alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{route('user.profile.edit')}}"><i class="bx bx-user"></i><span>Profile</span></a>
                        <div class="dropdown-divider mb-0"></div> <a class="dropdown-item"  href="{{ route('auth.logout') }}" onclick="logout(event)"><i
                                class="bx bx-power-off"></i><span>Logout</span></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
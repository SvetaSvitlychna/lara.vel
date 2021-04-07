<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                   User management
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt nav-icon">

                                </i>
                                  Permissions
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase nav-icon">

                                </i>
                                Roles
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route("users.index") }}" 
                            class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 
                            'active' : '' }}">
                                <i class="fa-fw fas fa-user nav-icon">

                                </i>
                                Users
                                </a>
                        </li>
                    </ul>
                </li>
            

            <li class="nav-item">
                <a href="{{ route("categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-list nav-icon">

                    </i>
                   Categories
                </a>
            </li> 


            <li class="nav-item">
                <a href="{{ route("posts.index") }}" class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-list nav-icon">

                    </i>
                   Posts
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("tags.index") }}" class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-list nav-icon">

                    </i>
                   Tags
                </a>
            </li> 

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Logout
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
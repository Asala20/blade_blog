<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Posts</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('showingPublicPosts')}}">Public</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('showingPrivatePosts')}}">Private</a></li>
                </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{url('admins')}}"> Admins </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{url('users')}}"> users </a></li>
                    </ul>
                </div>
            </li>
        </ul>
        </nav>


<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{ auth()->user()->getPhoto() }}" alt="{{ auth()->user()->name }}" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16">{{ auth()->user()->name }}</a>
                <p class="text-body mt-1 mb-0 font-size-13">About Us</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.users.index') }}" class=" waves-effect">
                        <i class="fas fa-users fa-fw"></i>
                        <span class="badge badge-pill badge-soft-secondary float-right">{{ \App\Models\User::count() }}</span>
                        <span class="text-capitalize">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.courses.index') }}" class=" waves-effect">
                        <i class="fas fa-book fa-fw"></i>
                        <span class="badge badge-pill badge-soft-secondary float-right">{{ \App\Models\Course::count() }}</span>
                        <span class="text-capitalize">course</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class=" waves-effect">
                        <i class="fas fa-bookmark fa-fw"></i>
                        <span class="badge badge-pill badge-soft-secondary float-right">{{ \App\Models\Category::whereActive(1)->count() }}</span>
                        <span class="text-capitalize">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tags.index') }}" class=" waves-effect">
                        <i class="fas fa-tags fa-fw"></i>
                        <span class="badge badge-pill badge-soft-secondary float-right">{{ \App\Models\Tag::count() }}</span>
                        <span class="text-capitalize">tags</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

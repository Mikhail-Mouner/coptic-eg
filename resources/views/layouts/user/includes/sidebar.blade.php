
<div class="vertical-menu h-100">

    <div class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="py-4">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Filter</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="fas fa-bookmark fa-fw"></i>
                        <span class="text-capitalize">All Courses</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="fas fa-bookmark fa-fw"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        @foreach($data_sidebar['categories'] as $item)
                            <li>
                                <a href="{{ route('category',$item->id) }}" class="waves-effect">
                                    <span class="badge badge-pill badge-soft-info float-right">{{ $item->courses_count }}</span>
                                    <span class="text-capitalize">{{ $item->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="fas fa-tags fa-fw"></i>
                        <span>Tags</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        @foreach($data_sidebar['tags'] as $item)
                            <li>
                                <a href="#" class="waves-effect">
                                    <span class="text-capitalize">{{ $item->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

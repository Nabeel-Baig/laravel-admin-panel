<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Dashboards')</span>
                    </a>
                </li>


                <li class="menu-title" key="t-apps">Admin</li>
                @can('user_management_access')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>User management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.permissions.index') }}" key="t-products">Permissions</a></li>
                        <li><a href="{{ route('admin.roles.index') }}" key="t-product-detail">Roles</a></li>
                        <li><a href="{{ route('admin.users.index') }}" key="t-product-detail">Users</a></li>
                    </ul>
                </li>
                @endcan

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Course Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.categories.index') }}" key="t-products">Categories</a></li>
                        <li><a href="{{ route('admin.courses.index') }}" key="t-products">Courses</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.users.index') }}" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Users</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.settings.edit',$setting->id) }}" class="waves-effect">
                        <i class="bx bx-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>

                @can('student_access')
                    <li class="menu-title" key="t-apps">Student</li>
                @endcan


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span
                            class="badge badge-pill badge-info float-right">03</span>
                        <span>Dashboard</span>
                    </a>

                </li>

                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="bx bx-money"></i>
                        <span>Transactions</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="bx bx-user-plus"></i>
                        <span>Referrals</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>


                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="bx bx-comment"></i>
                        <span>Support</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off"></i><span>{{ __('Logout') }}</span> </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

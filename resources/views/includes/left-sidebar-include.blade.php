<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class=" waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('transactions')}}" class=" waves-effect">
                        <i class="bx bx-line-chart"></i>
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
                        <span>Profile</span>
                    </a>
                </li>


                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="bx bxs-phone"></i>
                        <span>Support</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('show.pending.ph')}}" class=" waves-effect">
                        <i class="bx bx-git-merge"></i>
                        <span>Merge Pending PH</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('show.pending.gh')}}" class=" waves-effect">
                        <i class="bx bx-git-merge"></i>
                        <span>Merge Pending GH</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench"></i>
                        <span>Resolve Issues</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('fake.receipt.issues')}}">Fake Receipt</a></li>
                        <li><a href="{{route('unconfirmed.user.payment')}}">Unconfirmed Payments</a></li>
                    </ul>
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

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="bx bx-store"></i>
                        <span>Admin</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false" style="height: 0px;">
                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    </ul>
                </li>

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
                    <a href="{{route('show.messages')}}" class=" waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span>Messages </span>
                        @if($unread_messages > 0)
                            <span class="badge badge-danger">{{$unread_messages}}</span>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="{{route('show.admin.messages')}}" class=" waves-effect">
                        <i class="mdi mdi-facebook-messenger"></i>
                        <span>Messages (Admin)</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('show.referrals')}}" class=" waves-effect">
                        <i class="bx bx-user-plus"></i>
                        <span>Referrals</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('user.details')}}" class=" waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('create.news')}}" class=" waves-effect">
                        <i class="bx bxs-file-plus"></i>
                        <span>Create News</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('show.news')}}" class=" waves-effect">
                        <i class="bx bx-news"></i>
                        <span>News</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('show.users')}}" class=" waves-effect">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
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

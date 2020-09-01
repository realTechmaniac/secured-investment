<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Admin Menu ({{auth()->user()->role}})</li>
                <li>
                    <a href="{{route('admin.dashboard')}}" class=" waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard (Admin)</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('dashboard')}}" class=" waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard (Regular)</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('show.admin.messages')}}" class=" waves-effect">
                        <i class="mdi mdi-facebook-messenger"></i>
                        <span>Messages</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('create.news')}}" class=" waves-effect">
                        <i class="bx bxs-file-plus"></i>
                        <span>Create News</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.show.news')}}" class=" waves-effect">
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

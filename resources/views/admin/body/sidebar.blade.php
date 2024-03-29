<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        {{--  <div class="user-profile text-center mt-3">
            <div class="">
                <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>  --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu">


            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Manage Inventory</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('invetaris.all') }}">List Inventory</a></li>
                        <li><a href="{{ route('invetaris.add') }}">Form Inventory</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Manage Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('user.all') }}">Users</a></li>
                        <li><a href="{{ route('divisi.all') }}">Divisi</a></li>
                        <li><a href="{{ route('jenis.all') }}">Jenis</a></li>
                        <li><a href="{{ route('lokasi.all') }}">Lokasi</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Manage Request</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('request.all') }}">List Request Support</a></li>
                        {{--  <li><a href="{{ route('request.pending') }}">Request Proses</a></li>  --}}
                    </ul>
                </li>

                {{--  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>  --}}
                <!--- Pages  --->
                <li class="menu-title">Pages</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Profile</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.profile') }}">Profile</a></li>
                        <li><a href="{{ route('edit.profile') }}">Edit Profile</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-search-eye-line"></i>
                        <span>Monitoring Periperal</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.profile') }}">Network</a></li>
                        <li><a href"/"=>CCTV</a></li>
                        <li><a href"/"=>Notes</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="far fa-sticky-note"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Notes</span>
                    </a>
                </li>

                <!--- Forms  --->
                <li class="menu-title">Forms </li>
                    <li>
                        <a href="{{ route('request.add') }}" class="waves-effect">
                            <i class="ri-profile-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                            <span>Request Support</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('form.all') }}" class="waves-effect">
                            <i class="fab fa-wpforms"></i><span class="badge rounded-pill bg-success float-end"></span>
                            <span>Peminjaman Elektronic</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="fab fa-wpforms"></i><span class="badge rounded-pill bg-success float-end"></span>
                            <span>Form Item Request</span>
                        </a>
                    </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

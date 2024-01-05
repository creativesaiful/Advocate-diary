 <!-- ========== Left Sidebar Start ========== -->
 <div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fe-airplay"></i>
                        
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="{{ Request::is('courts*') ? 'mm-active' : ''}}" >
                    <a href="javascript: void(0);">
                        <i class="fe-briefcase"></i>
                        <span> Courts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('courts.index') }}">Court List</a></li>
                     
                    </ul>


                </li>

                <li class="{{ Request::is('case*') ? 'mm-active' : ''}}">
                    <a href="javascript: void(0);">
                        <i class="fe-briefcase"></i>
                        <span> Case </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('case.list') }}">Case List</a></li>
                        <li><a href="{{ route('case.create') }}">Case Add</a></li>
                     
                    </ul>


                </li>



            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
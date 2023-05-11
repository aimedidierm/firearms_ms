<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/register" class="site_title"><i class="fa fa-database"></i> <span>Firearms MS
                    system</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome, Register</span>
                <h2>{{Auth::guard("register")->user()->names}}</h2>
            </div>
        </div>

        <br />
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="/register/applicants"><i class="fa fa-users"></i> Applicants </span></a>
                    </li>
                    <li><a href="/register/psychiatric"><i class="fa fa-university"></i> Psychiatric approved
                            </span></a>
                    </li>
                    <li><a href="/register/trained"><i class="fa fa-male"></i> Applicants in training</span></a>
                    </li>
                    <li><a href="/register/exam"><i class="fa fa-bars"></i> Exam</span></a>
                    </li>
                    <li><a href="/register/approved"><i class="fa fa-check"></i> Approved</span></a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Account management</h3>
                <ul class="nav side-menu">
                    <li><a href="/register"><i class="fa fa-gear"></i> Settings </span></a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        <img src="/images/user.png" alt="">{{Auth::guard("register")->user()->names}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/register"> Profile</a>
                        <a class="dropdown-item" href="/register">
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out pull-right"></i>
                            Log Out</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
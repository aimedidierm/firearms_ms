<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/director" class="site_title"><i class="fa fa-database"></i> <span>Firearms MS
                    system</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome, Director</span>
                <h2>{{Auth::guard("director")->user()->names}}</h2>
            </div>
        </div>

        <br />
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="/director/applicants"><i class="fa fa-users"></i> All applicants </span></a>
                    </li>
                    <li><a href="/director/register"><i class="fa fa-user"></i> Register approved
                            </span></a>
                    </li>
                    <li><a href="/director/trained"><i class="fa fa-male"></i> Applicants in training</span></a>
                    </li>
                    <li><a href="/director/training"><i class="fa fa-futbol-o"></i> Training</span></a>
                    </li>
                    <li><a href="/director/exam"><i class="fa fa-bars"></i> Exams</span></a>
                    </li>
                    <li><a href="/director/approved"><i class="fa fa-check"></i> Approved</span></a>
                    </li>
                    <li><a href="/director/rejected"><i class="fa fa-times-circle"></i> Rejected</span></a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Account management</h3>
                <ul class="nav side-menu">
                    <li><a href="/director"><i class="fa fa-gear"></i> Settings </span></a>
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
                        <img src="/images/user.png" alt="">{{Auth::guard("director")->user()->names}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/director"> Profile</a>
                        <a class="dropdown-item" href="/director">
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
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="index.html">ATMC</a> -->
            <img src="../images/logo.jpg" class="img img-responsive" style="height:85px; width: 250px;">
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
         
          
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="changepass.php"><i class="fa fa-lock fa-fw"></i>change password</a>
            </li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <!-- <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                    </button>
                </span>
            </div> -->
            <!-- /input-group -->
        </li>
        <li>
            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Staff<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="add-staff.php">Add Staff</a>
                </li>
                <li>
                    <a href="view-staff.php">View Staff</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Stationery<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="add-stationery.php">Add Stationery</a>
                </li>
                <li>
                    <a href="view-stationery.php">View Stationery</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
         <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Requests<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="requests.php">All Request</a>
                </li>
                <li>
                    <a href="pending.php">Pending Request</a>
                </li>
                <li>
                    <a href="approved.php">Approved Request</a>
                </li>
                <li>
                    <a href="disapprove.php">Disapprove Request</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
     <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Stock<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="add-stock.php">Add stock</a>
                </li>
                <li>
                    <a href="view-stock.php">View Stock</a>
                </li>
            </ul>


    </ul>
        
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
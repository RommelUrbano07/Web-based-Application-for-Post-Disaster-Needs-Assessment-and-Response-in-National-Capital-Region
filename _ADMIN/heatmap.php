<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta
            name="keywords"
            content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, ample admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, material design, material dashboard bootstrap 4 dashboard template"
            />
        <meta
            name="description"
            content="Ample Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
            />
        <meta name="robots" content="noindex,nofollow" />
        <title>iRespondPH - HeatMap</title>
        <link
            rel="canonical"
            href="https://www.wrappixel.com/templates/ample-admin-lite/"
            />
        <!-- Font awesome icons -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
            />
        <!-- Favicon icon -->
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="AdminDesign_Ext/plugins/images/logo.png"
            />
        <!-- Bootstrap Core CSS -->
        <link href="AdminDesign_Ext/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Menu CSS -->
        <link
            href="AdminDesign_Ext/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css"
            rel="stylesheet"
            />
        <!-- animation CSS -->
        <link href="AdminDesign_Ext/css/animate.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="AdminDesign_Ext/css/style.css" rel="stylesheet" />
        <!-- color CSS -->
        <link href="AdminDesign_Ext/css/colors/default.css" id="theme" rel="stylesheet" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
           <link
      href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900"
      rel="stylesheet"
    />
    <link href="../lib/Client/images/logo.png" rel="icon" />
    <link href="../lib/Client/images/logo.png" rel="apple-touch-icon" />

    <link rel="stylesheet" href="../lib/Client/css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="../lib/Client/css/animate.css" />
    <!-- Font Awesome CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />

    </head>

    <body class="fix-header">
        <!-- ============================================================== -->
        <!-- Preloader -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle
                class="path"
                cx="50"
                cy="50"
                r="20"
                fill="none"
                stroke-width="2"
                stroke-miterlimit="10"
                />
            </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Wrapper -->
        <!-- ============================================================== -->
        <div id="wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">
                    <div class="top-left-part">
                        <!-- Logo -->
                        <a class="logo" href="dashboard.php">
                            <!-- Logo icon image, you can use font-icon also -->

                            <a class="logo" href="dashboard.php" style="color: orange;">
                                <!-- Logo icon image, you can use font-icon also --><b>
                                    <!--This is dark logo icon--><img src="AdminDesign_Ext/plugins/images/small-logo.png" alt="home"
                                                                      class="dark-logo" />
                                    <!--This is light logo icon--><img src="AdminDesign_Ext/plugins/images/small-logo.png" alt="home"
                                                                       class="light-logo lowgo" /> <span class="head-texts">irespondPH</span> </b></a>

                    </div>
                    <!-- /Logo -->
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                            <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg"
                               href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                        </li>
                        
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="../image/default-avatar.png" alt="user-img" width="36" class="img-circle" />
                                <b class="hidden-xs">
                                <?php 
                                include'../_COMMANDS/Admin_Commands.php';
                                $AdminCommands = new Admin_Commands();
                                echo $AdminCommands->GetAdminFirstName($_SESSION['AdminUsername']);
                                ?>
                                </b></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
            <!-- End Top Navigation -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav slimscrollsidebar">
                    <div class="sidebar-head">
                        <h3>
                            <span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span>
                            <span class="hide-menu">Navigation</span>
                        </h3>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li style="padding: 70px 0 0">
                            <a href="dashboard.php" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                                                            aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="history.php" class="waves-effect"><i class="fas fa-history" style="margin-right: 12px;"
                                                                          aria-hidden="true"></i>History
                                View</a>
                        </li>
                        <?php
                        $Username = $_SESSION["AdminUsername"];
                        $Password = $_SESSION["AdminPassword"];
                        if ($AdminCommands->checkMasterLogIn($Username, $Password) == TRUE) {
                            ?>
                            <li>
                                <a href="registeradmin.php" class="waves-effect"><i class="fas fa-users-cog"
                                                                                    style="margin-right: 12px;" style="margin-right: 12px;" aria-hidden="true"></i>Register
                                    Admin</a>
                            </li>
                            <?php
                        }
                        ?>
                        <li>
                            <a href="disasterreport.php" class="waves-effect"><i class="fas fa-house-damage"
                                                                                 style="margin-right: 12px;" aria-hidden="true"></i>Disaster
                                Report</a>
                        </li>
                        <li>
                            <a href="registerfamily.php" class="waves-effect"><i class="fas fa-user-friends" style="margin-right: 12px;"
                                                                                 aria-hidden="true"></i>Register
                                Family</a>
                        </li>
                        <li>
                            <a href="summaryreport.php" class="waves-effect"><i class="fas fa-table" style="margin-right: 12px;"
                                                                                aria-hidden="true"></i>Summary
                                Report</a>
                        </li>
                        <li>
                            <a href="editfamilyregistry.php" class="waves-effect"><i class="fas fa-users" style="margin-right: 12px;"
                                                                                     aria-hidden="true"></i>Edit
                                Family Registry</a>
                        </li>
                        <li>
                            <a href="heatmap.php" class="waves-effect"><i class="fas fa-globe-asia" style="margin-right: 12px;"
                                                                          aria-hidden="true"></i>HeatMap</a>
                        </li>
                        <li>
                            <a href="searchpersonalinfo.php" class="waves-effect"><i class="fas fa-user-edit" style="margin-right: 12px;"
                                                                                     aria-hidden="true"></i>Update Personal Info</a>
                        </li>
                        <li>
                            <a href="DonationApproval.php" class="waves-effect"><i class="fas fa-table" style="margin-right: 12px;"
                                                                                   aria-hidden="true"></i>Donation
                                Approval</a>
                        </li>
                        <li>
                            <a href="donationinventory.php" class="waves-effect"><i class="fas fa-table" style="margin-right: 12px;"
                                                                                    aria-hidden="true"></i>Relief Item 
                                Inventory</a>
                        </li>
                        <li>
                            <a href="donationhistory.php" class="waves-effect"><i class="fas fa-history" style="margin-right: 12px;"
                                                                                  aria-hidden="true"></i>Donation History
                                View</a>
                        </li>
                        <li>
                            <a href="admintransactionhistory.php" class="waves-effect"><i class="fas fa-history" style="margin-right: 12px;"
                                                                                   aria-hidden="true"></i>Admin Transation History Logs</a>
                        </li>
                        <li>
                            <a href="ActiveReportsDonations.php" class="waves-effect"><i class="fas fa-table" style="margin-right: 12px;"
                                                                                    aria-hidden="true"></i>Relief Request For Every City</a>
                        </li>
                    </ul>
                    <div class="center p-20">
                        <form action="AdminLogin.php">
                            <button type="submit"
                           class="btn btn-block waves-effect waves-light" style="background-color: orange; color: white;">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Left Sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Heat Map</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <a href="../_CLIENT/index.php" target="_blank"
                               class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"
                               style="background-color: orange;color: white;">Visit Client Side</a>
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">HeatMap</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <style>
                       .card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 300px;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
.card > hr {
  margin-right: 0;
  margin-left: 0;
}
.card > .list-group:first-child .list-group-item:first-child {
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}
.card > .list-group:last-child .list-group-item:last-child {
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.card-body {
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1.25rem;
}

.card-title {
  margin-bottom: 0.75rem;
}

.card-subtitle {
  margin-top: -0.375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link:hover {
  text-decoration: none;
}

.card-link + .card-link {
  margin-left: 1.25rem;
}

.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}
.card-header + .list-group .list-group-item:first-child {
  border-top: 0;
}

.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: rgba(0, 0, 0, 0.03);
  border-top: 1px solid rgba(0, 0, 0, 0.125);
}
.card-footer:last-child {
  border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
  margin-right: -0.625rem;
  margin-bottom: -0.75rem;
  margin-left: -0.625rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.625rem;
  margin-left: -0.625rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem;
}

.card-img {
  width: 100%;
  border-radius: calc(0.25rem - 1px);
}

.card-img-top {
  width: 100%;
  border-top-left-radius: calc(0.25rem - 1px);
  border-top-right-radius: calc(0.25rem - 1px);
}

.card-img-bottom {
  width: 100%;
  border-bottom-right-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-deck {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.card-deck .card {
  margin-bottom: 15px;
}
@media (min-width: 576px) {
  .card-deck {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    margin-right: -15px;
    margin-left: -15px;
  }
  .card-deck .card {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
    -ms-flex: 1 0 0%;
    flex: 1 0 0%;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-right: 15px;
    margin-bottom: 0;
    margin-left: 15px;
  }
}

.card-group {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.card-group > .card {
  margin-bottom: 15px;
}
@media (min-width: 576px) {
  .card-group {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
  }
  .card-group > .card {
    -webkit-box-flex: 1;
    -ms-flex: 1 0 0%;
    flex: 1 0 0%;
    margin-bottom: 0;
  }
  .card-group > .card + .card {
    margin-left: 0;
    border-left: 0;
  }
  .card-group > .card:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-top,
  .card-group > .card:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-bottom,
  .card-group > .card:not(:last-child) .card-footer {
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-top,
  .card-group > .card:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-bottom,
  .card-group > .card:not(:first-child) .card-footer {
    border-bottom-left-radius: 0;
  }
}

.card-columns .card {
  margin-bottom: 0.75rem;
}

@media (min-width: 576px) {
  .card-columns {
    -webkit-column-count: 3;
    column-count: 3;
    -webkit-column-gap: 1.25rem;
    column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }
  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}
                    </style>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="white-box">
                                <h3 class="box-title">HeatMap</h3>
                                <h2 class="mb-4">Philippine Disaster Heat Map </h2>
                                <p>The Heat Map shows the real-time condition of the Philippines</p>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                <iframe src="../heatmap.php" width="100%" height="450px" style='border: none; overflow: visible;'></iframe>    
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                            <h2 class="mb-4"> Heat Map Legend </h2>
                                            <p>Below is the color representation of intensity of the disasters. This legend is based from an international study about scaling the severity of a disaster </p>
                                            <div class="card" style="background: #008000">
                                                        <div class="card-body"></div>
                                                    </div>
                                                    <p>No Disaster</p>
                                                    <div class="card" style="background: #ffff00">
                                                        <div class="card-body"></div>
                                                    </div>
                                                    <p>Intensity #1</p>
                                                    <div class="card" style="background: #ff4500">
                                                        <div class="card-body"></div>
                                                    </div>
                                                    <p>Intensity #2</p>
                                                    <div class="card" style="background: #8b0000">
                                                        <div class="card-body"></div>
                                                    </div>
                                                    <p>Intensity #3</p>
                                                    <div class="card" style="background: #000">
                                                        <div class="card-body"></div>
                                                    </div>
                                                    <p>Intensity #4</p>
                                    </div>
                                            </div>
                                        </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <footer class="footer text-center">
                    © 2020 Ample Admin by
                    <a href="https://www.wrappixel.com/">wrappixel.com</a>
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="AdminDesign_Ext/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="AdminDesign_Ext/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="AdminDesign_Ext/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
        <!--slimscroll JavaScript -->
        <script src="AdminDesign_Ext/js/jquery.slimscroll.js"></script>
        <!--Wave Effects -->
        <script src="AdminDesign_Ext/js/waves.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="AdminDesign_Ext/js/custom.min.js"></script>
       
    </body>
</html>

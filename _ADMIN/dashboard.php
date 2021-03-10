<?php
session_start();

include '../_COMMANDS/Admin_Commands.php';
$AdminCommands = new Admin_Commands();
$Username = $_SESSION["AdminUsername"];
$Password = $_SESSION["AdminPassword"];
?>
<!DOCTYPE html>
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
        <title>iRespondPH - Admin</title>
        <link
            rel="canonical"
            href="https://www.wrappixel.com/templates/ample-admin-lite/"
            />
        <!-- Favicon icon -->
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="AdminDesign_Ext/plugins/images/logo.png"
            />
        <!-- Font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
        <!-- Bootstrap Core CSS -->
        <link href="AdminDesign_Ext/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Menu CSS -->
        <link
            href="AdminDesign_Ext/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css"
            rel="stylesheet"
            />
        <!-- toast CSS -->
        <link
            href="AdminDesign_Ext/plugins/bower_components/toast-master/css/jquery.toast.css"
            rel="stylesheet"
            />
        <!-- morris CSS -->
        <link
            href="AdminDesign_Ext/plugins/bower_components/morrisjs/morris.css"
            rel="stylesheet"
            />
        <!-- chartist CSS -->
        <link
            href="AdminDesign_Ext/plugins/bower_components/chartist-js/dist/chartist.min.css"
            rel="stylesheet"
            />
        <link
            href="AdminDesign_Ext/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
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
                                    <!--This is dark logo icon--><img src="AdminDesign_Ext/plugins/images/small-logo.png" alt="home" class="dark-logo" />
                                    <!--This is light logo icon--><img src="AdminDesign_Ext/plugins/images/small-logo.png" alt="home" class="light-logo lowgo"/> <span class="head-texts">irespondPH</span> </b></a>

                    </div>
                    <!-- /Logo -->
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                            <a
                                class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg"
                                href="javascript:void(0)"
                                ><i class="fa fa-bars"></i
                                ></a>
                        </li>
                        
                         <li>
                            <a href="#news">News Section</a>
                           
                        </li>
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="../image/default-avatar.png" alt="user-img" width="36" class="img-circle" />
                                <b class="hidden-xs">
                                <?php 
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
                            <span class="fa-fw open-close"
                                  ><i class="ti-close ti-menu"></i
                                ></span>
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
                            <h4 class="page-title" id="welcome">Welcome to IRespondPH!</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <a
                                href="../_CLIENT/index.php"
                                target="_blank"
                                class="btn  pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"
                                style="background-color: orange; color: white;"
                                >Visit Client Side</a
                            >
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <!-- ============================================================== -->
                    <!-- Different data widgets -->
                    <!-- ============================================================== -->
                    <!-- .row -->
                    <center>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Total Reports Today</h3>
                                <ul class="list-inline two-part">
                                    <li>
                                        <div id="sparklinedash"></div>
                                    </li>
                                    <li class="text-right">
                                        <i class="ti-arrow-up text-success"></i>
                                        <span class="counter text-success">
                                            <?php
                                            include '../_COMMANDS/SummaryReport.php';
                                            $SummaryReport = new SummaryReport();

                                            #No of Disasters
                                            $NoOfDisasters = $SummaryReport->NoOfDisastersCurrentDay();
                                            echo $NoOfDisasters;
                                            ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Weekly Reports</h3>
                                <ul class="list-inline two-part">
                                    <li>
                                        <div id="sparklinedash2"></div>
                                    </li>
                                    <li class="text-right">
                                        <i class="ti-arrow-up text-purple"></i>
                                        <span class="counter text-purple"><?php
                                            $NoOfDisasters = $SummaryReport->NoOfDisastersCurrentWeek();
                                            echo $NoOfDisasters;
                                            ?></span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Aid Finished</h3>
                                <ul class="list-inline two-part">
                                    <li>
                                        <div id="sparklinedash3"></div>
                                    </li>
                                    <li class="text-right">
                                        <i class="ti-arrow-up text-info"></i>
                                        <span class="counter text-info"><?php
                                            $NoOfDisasters = $SummaryReport->NoOfDisastersResolved();
                                            echo $NoOfDisasters;
                                            ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </center>
                    <!--/.row -->
                    <!--row -->
                    <!-- /.row -->

                    <div class="container white-box">
                        <h3 class="box-title" style="text-align: center; font-size: 20px; font-weight: bold">Most Common Natural Disasters in the Philippines</h3>
                        <div class="row">

                            <div id="carousel-example-generic" class="carousel-bg carousel slide" data-ride="carousel" style="margin-top: -2px">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active" style="background-image: url(https://images.unsplash.com/photo-1516536032882-8fa1f10ecd27?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80);">
                                        <div class="carousel-caption">
                                            Volcanic Eruptions
                                        </div>
                                    </div>
                                    <div class="item" style="background-image: url(https://images.unsplash.com/photo-1455747634646-0ef67dfca23f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80);">
                                        <div class="carousel-caption">
                                            Fire
                                        </div>
                                    </div>
                                    <div class="item" style="background-image: url(https://images.unsplash.com/photo-1547683905-f686c993aae5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80);">
                                        <div class="carousel-caption">
                                            Flooding
                                        </div>
                                    </div>
                                    <div class="item"
                                         style="background-image: url(https://images.pexels.com/photos/1344265/pexels-photo-1344265.jpeg?cs=srgb&dl=pexels-denniz-futalan-1344265.jpg&fm=jpg);">
                                        <div class="carousel-caption">
                                            Typhoon
                                        </div>
                                    </div>
                                    <div class="item"
                                         style="background-image: url(https://images.unsplash.com/photo-1543398355-bb0d4b80ae22?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1511&q=80);">
                                        <div class="carousel-caption">
                                            Earthquake
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- table -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="white-box">
                                <h3 class="box-title" style="text-align: center; font-size: 20px; font-weight: bold">Top 10 Worst Disaster in the Philippines</h3>
                                <div class="table-responsive">
                                    <center>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Disaster Name</th>
                                                <th style="padding-right: 100px;">Date</th>
                                                <th style="margin-right: 100px;">Casualties </th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="txt-oflo">Typhoon Yolanda (Haiyan)</td>
                                                <td>8-Nov-2013</td>
                                                <td class="txt-oflo"><span class="text-danger">7000</span></td>
                                                <td>Typhoon Yolanda is one of the world's strongest and deadliest typhoons, prompting a rare public storm signal no. 4 in
                                                    the Visayas. (READ: Storm signal no. 4 in PH history). Typhoon Yolanda caused massive devastation that killed 6,300
                                                    people.</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="txt-oflo">Mindanao earthquake</td>
                                                <td>17-Aug-1976</td>
                                                <td class="txt-oflo"><span class="text-danger">6000</span></td>
                                                <td>With a magnitude of 7.9, it is also considered one of the strongest earthquakes to ever hit the country. According to
                                                    the Philippine Institute of Volcanology and Seismology (PHIVOLCS), the tremor caused a tsunami in the coastline of the
                                                    Moro Gulf in the North Celebes Sea. This “tsunamigenic earthquake” caused buildings to collapse, and killed around 6,000
                                                    people.</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="txt-oflo">Typhoon Uring (Thelma)</td>
                                                <td>5-Nov-1991</td>
                                                <td class="txt-oflo"><span class="text-danger">5,956</span></td>
                                                <td>Typhoon Uring is the second deadliest typhoon to hit the country. On November 5, 1991, it brought torrential rains over
                                                    Leyte, causing several rivers to overflow and triggering massive flooding. It killed around 5,000 people, majority of
                                                    whom were residents of Ormoc City</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="txt-oflo">1990 Luzon earthquake</td>
                                                <td>16-Jul-1990</td>
                                                <td class="txt-oflo"><span class="text-danger">2412</span></td>
                                                <td>With a magnitude of 7.8, it is considered as one of the strongest and most devastating earthquakes to hit the country.
                                                    The 1990 tremor caused several buildings and hotels to collapse in the cities of Baguio, Dagupan and Cabanatuan –
                                                    burying people alive. The earthquake left 2,412 people dead.</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td class="txt-oflo">Typhoon Pablo (Bopha)</td>
                                                <td>4-Dec-2012</td>
                                                <td class="txt-oflo"><span class="text-danger">1901</span></td>
                                                <td>Typhoon Pablo is one of the worst typhoons to hit Mindanao, causing massive flooding and killing 1,901 people.</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td class="txt-oflo">Tropical Depression Winnie</td>
                                                <td>29-Nov-2004</td>
                                                <td class="txt-oflo"><span class="text-danger">1619</span></td>
                                                <td>In 2004, Tropical Depression Winnie struck Luzon and Visayas. Although it was not as strong as the other typhoons, it
                                                    brought continuous torrential rain especially in Central Luzon, causing landslides and killing 1,619 people. The name
                                                    “Winnie” was retired after this.</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td class="txt-oflo">Typhoon Titang (Kate)</td>
                                                <td>13-Oct-1970</td>
                                                <td class="txt-oflo"><span class="text-danger">1551</span></td>
                                                <td>Also one of the strongest typhoons to hit Mindanao, Typhoon Titang's strong winds and heavy rains left 1,551 people
                                                    dead.</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td class="txt-oflo">Typhoon Sendong (Washi)</td>
                                                <td>15-Dec-2011</td>
                                                <td class="txt-oflo"><span class="text-danger">1439</span></td>
                                                <td>On December 15, 2011, Sendong hit the northern part of Mindanao and killed 1,439 people. Because of the massive number
                                                    of fatalities and the damage it brought, it is also considered one of the deadliest typhoons in the Philippines.</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td class="txt-oflo">Typhoon Nitang (Ike)</td>
                                                <td>1-Sep-1984</td>
                                                <td class="txt-oflo"><span class="text-danger">1422</span></td>
                                                <td>Typhoon Ike battered Central Visayas on September 1, 1984. It made several landfalls and brought strong winds and rains
                                                    that caused the largest river in Negros Occidental to overflow. At least 1,422 people were killed.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td class="txt-oflo">Typhoon Reming (Durian)</td>
                                                <td>30-Nov-2006</td>
                                                <td class="txt-oflo"><span class="text-danger">1399</span></td>
                                                <td>Months after Mt. Mayon’s eruption in 2006, Bicolanos faced another natural disaster when Typhoon Reming hit Albay in
                                                    November 30. The flood caused by the typhoon was aggravated by the mud coming from the volcano, leaving 1,399 people
                                                    dead.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- chat-listing & recent comments -->
                    <!-- ============================================================== -->
                    <div class="row" id="news">
                        <!-- .col -->
                        <div  class="col-md-12 col-lg-8 col-sm-12">
                            <div class="white-box" style="height: 1500px">
                                <h3 class="box-title" style="text-align: center; font-size: 20px; font-weight: bold">Recent News</h3>
                                
                                        <?php 
                                        include '../_COMMANDS/NewsSection.php';
                                        $News = new NewsSection();
                                        
                                        $result = $News->getNews();
                                        
                                        while($rows=mysqli_fetch_assoc($result)){
                                        $NewsID = $rows['NewsID'];
                                        ?>
                                            <div class="comment-center p-t-10">
                                            <div class="comment-body">
                                            <div class="mail-contnet"> 
                                            <h5><?php echo $rows['NewsAuthorFName'].' '.$rows['NewsAuthorMName'].' '.$rows['NewsAuthorLName'].' '.$rows['NewsAuthorSuffix']; ?></h5>
<!--                                            <span class="time"><?php // echo $rows['NewsDate'].' '.$rows['NewsTime']; ?></span> <br />-->
                                            <span class="time"><?php echo $rows['NewsTime']?></span> <br />
                                            <span class="mail-desc"><?php echo $rows['NewsContent'];?></span> 
                                            
                                            <form action="EditNewsPage.php" method="POST">
                                                <input type="hidden" name="NewsID" value="<?php echo $NewsID; ?>">
                                                <input type="hidden" name="NewsFirstName" value="<?php echo $rows['NewsAuthorFName']; ?>">
                                                <input type="hidden" name="NewsMiddleName" value="<?php echo $rows['NewsAuthorMName']; ?>">
                                                <input type="hidden" name="NewsLastName" value="<?php echo $rows['NewsAuthorLName']; ?>">
                                                <input type="hidden" name="NewsSuffix" value="<?php echo $rows['NewsAuthorSuffix']; ?>">
                                                <input type="hidden" name="NewsContent" value="<?php echo $rows['NewsContent']; ?>">
                                                <input type="submit" value="Edit" class="btn btn-block waves-effect waves-light" style="background-color: orange; color: white; width: 170px; float: left"/>
                                            </form>
                                            
                                            <form action="DeleteNewsProcess.php" method="POST">
                                                <input type="hidden" name="NewsID" value="<?php echo $NewsID; ?>">
                                                <input type="submit"  value="Delete" class="btn btn-block waves-effect waves-light" style="background-color: orange; color: white; width: 170px; float: right"/>
                                            </form>
                                        
                                            </div>
                                            </div>
                                            </div>
                                        <?php 
                                        }
                                        ?>
                                        
                                <br>
                                    
                            </div>             
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="panel">
                                <div class="sk-chat-widgets">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"style="text-align: center; font-size: 20px; font-weight: bold" >Submit Recent News</div>
                                        <div class="panel-body">
                                                <div class="form-group" >
                                                    <form action="PostNewsProcess.php" method="POST">
                                                        <input name='NewsAuthorFName' type='text' class="form-control"  placeholder="Author's First Name" title='FirstName' data-pattern='textOnly' required><br>
                                                        <input name='NewsAuthorMName' type='text' class="form-control"  placeholder="Author's Middle Name" title='MiddleName' data-pattern='textOnly' required><br>
                                                        <input name='NewsAuthorLName' type='text' class="form-control"  placeholder="Author's Last Name" title='LastName' data-pattern='textOnly' required><br>
                                                        <input name='NewsSuffix' type='text' class="form-control"  placeholder="Suffix" title='Suffix' data-pattern='textOnly'><br>
                                                        <textarea name="NewsContent" rows="4" cols="50" type='text' class="form-control"  placeholder="News Description" title='description' data-pattern='textOnly' required></textarea><br>
                                                        <input type="submit"  class="btn btn-block waves-effect waves-light" style="background-color: orange; color: white; width: 170px; float: right"/>  
                                                    </form>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
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
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->

        <script src="AdminDesign_Ext/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="AdminDesign_Ext/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="AdminDesign_Ext/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
        <!--slimscroll JavaScript -->
        <script src="AdminDesign_Ext/js/jquery.slimscroll.js"></script>
        <!--Wave Effects -->
        <script src="AdminDesign_Ext/js/waves.js"></script>
        <!--Counter js -->
        <script src="AdminDesign_Ext/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
        <script src="AdminDesign_Ext/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
        <!-- chartist chart -->
        <script src="AdminDesign_Ext/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
        <script src="AdminDesign_Ext/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
        <!-- Sparkline chart JavaScript -->
        <script src="AdminDesign_Ext/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="AdminDesign_Ext/js/custom.min.js"></script>
        <script src="AdminDesign_Ext/js/dashboard1.js"></script>
        <script src="AdminDesign_Ext/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    </body>
</html>
<?php exit; ?>

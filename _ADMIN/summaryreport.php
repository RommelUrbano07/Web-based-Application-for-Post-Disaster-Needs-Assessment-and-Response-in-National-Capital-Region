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
        <title>iRespondPH - Summmary Report</title>
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
                            <h4 class="page-title">Summary Report</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <a href="../_CLIENT/index.php" target="_blank"
                               class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"
                               style="background-color: orange;color: white;">Visit Client Side</a>
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Summary Report</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 class="box-title">Summary Report</h3>
                                <section id="main">
                                    <div class="container">
                                        <div class="row">
                                            <div class="panel panel-default">
                                                <div class="panel-heading main-color-bg">
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-md-3">
                                                        <div class="well dash-box">
                                                            <?php
                                                            include '../_COMMANDS/SummaryReport.php';
                                                            $SummaryReport = new SummaryReport();
                                                            ?>
                                                            <h2><span class="glyphicon glyphicon-Alert-triangle-box" aria-hidden="true">
                                                                    <?php
                                                                    #No of Disasters
                                                                    $NoOfDisasters = $SummaryReport->NoOfDisasters();
                                                                    echo $NoOfDisasters;
                                                                    ?></h2></span> 
                                                            </h2>
                                                            <h4>No. Of Disasters</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="well dash-box">
                                                            <h2><span class="glyphicon glyphicon-eye" aria-hidden="true"><?php
                                                                    #Regions Affected
                                                                    $RegionAffected = new ArrayObject();
                                                                    $result = $SummaryReport->RegionsAffected();
                                                                    if ($result != null) {
                                                                        while ($rows = mysqli_fetch_assoc($result)) {
                                                                            $RegionAffected->append($rows["region"]);
                                                                        }
                                                                        #getting per value in ArrayObject
                                                                        for ($i = 0; $i < $RegionAffected->count(); $i++) {
                                                                            $RegionAffected->offsetGet($i);
                                                                        }
                                                                        echo $RegionAffected->count();
                                                                    } else {
                                                                        echo 0;
                                                                    }
                                                                    ?></span> 

                                                            </h2>
                                                            <h4>Regions Affected</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="well dash-box">
                                                            <h2><span class="glyphicon glyphicon-compass" aria-hidden="true">
                                                                    <?php
                                                                    #Cities Affected
                                                                    $CitiesAffected = new ArrayObject();
                                                                    $result = $SummaryReport->CitiesAffected();
                                                                    if ($result != null) {
                                                                        while ($rows = mysqli_fetch_assoc($result)) {
                                                                            $CitiesAffected->append($rows["City"]);
                                                                        }
                                                                        #getting per value in ArrayObject
                                                                        for ($i = 0; $i < $CitiesAffected->count(); $i++) {
                                                                            $CitiesAffected->offsetGet($i);
                                                                        }
                                                                        echo $CitiesAffected->count();
                                                                    } else {
                                                                        echo 0;
                                                                    }
                                                                    ?>
                                                                </span> 
                                                            </h2>
                                                            <h4>Cities Affected</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-md-3">
                                                        <div class="well dash-box">
                                                            <h2><span class="glyphicon glyphicon-building" aria-hidden="true"><?php
                                                                    #Barangay Affected
                                                                    $BarangayAffected = new ArrayObject();
                                                                    $result = $SummaryReport->BarangayAffected();
                                                                    if ($result != null) {
                                                                        while ($rows = mysqli_fetch_assoc($result)) {
                                                                            $BarangayAffected->append($rows["BarangayName"]);
                                                                        }
                                                                        #getting per value in ArrayObject
                                                                        for ($i = 0; $i < $BarangayAffected->count(); $i++) {
                                                                            $BarangayAffected->offsetGet($i);
                                                                        }
                                                                        echo $BarangayAffected->count();
                                                                    } else {
                                                                        echo 0;
                                                                    }
                                                                    ?></span> 

                                                            </h2>
                                                            <h4>Barangays Affected</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="well dash-box">
                                                            <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true">
                                                                    <?php
                                                                    #Needs Per Quantity
                                                                    $NeedsType = new ArrayObject();
                                                                    $NeedsQuantity = new ArrayObject();
                                                                    $result = $SummaryReport->NeedsPerQuantity();
                                                                    if ($result != null) {
                                                                        while ($rows = mysqli_fetch_assoc($result)) {
                                                                            $NeedsType->append($rows["needs"]);
                                                                            $NeedsQuantity->append($rows["sum"]);
                                                                        }

#                                       #getting per value in ArrayObject
                                                                        for ($i = 0; $i < $NeedsType->count(); $i++) {
                                                                            echo $NeedsType->offsetGet($i) . ":" . $NeedsQuantity->offsetGet($i) . '<br>';
                                                                        }
                                                                    } else {
                                                                        echo 0;
                                                                    }
                                                                    ?>
                                                                </span> 

                                                            </h2>
                                                            <h4>Needs Per Quantity</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-md-3">
                                                        <div class="well dash-box">
                                                            <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"><?php
                                                                    #No of Vicitims
                                                                    $NoOfDisasters = (int) $SummaryReport->NoOfVictims();
                                                                    echo " " . $NoOfDisasters;
                                                                    ?></span> 

                                                            </h2>
                                                            <h4>No. Of Victims</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="well dash-box">
                                                            <h2><span class="glyphicon glyphicon-house fill" aria-hidden="true">
                                                                    <?php
                                                                    #No of Families
                                                                    $NoOfDisasters = $SummaryReport->NoOfFamiliesAffected();
                                                                    echo $NoOfDisasters;
                                                                    ?>
                                                                </span> 

                                                            </h2>
                                                            <h4>No Of Families</h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-body col-md-3" >
                                                    <section>
                                                        <center>
                                                        <table class="content-table" onclick="setActive(this)">
                                                            <thead>
                                                                <tr>
                                                                    <th style="color: white; text-align: center">Disaster Type</th>
                                                                    <th style="color: white; text-align: center">Regions Affected</th>
                                                                    <th style="color: white; text-align: center">Cities Affected</th>
                                                                    <th style="color: white; text-align: center">Barangays Affected</th>
                                                                    <th style="color: white; text-align: center">Needs Per Quantity</th>
                                                                    <th style="color: white; text-align: center">No. Of Victims</th>
                                                                    <th style="color: white; text-align: center">No. Of Families</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $DisasterID = new ArrayObject();
                                                                $result = $SummaryReport->getDisasterID();
                                                                if ($result != null) {
                                                                    while ($rows = mysqli_fetch_assoc($result)) {
                                                                        $DisasterID->append($rows["DisasterType"]);
                                                                    }
                                                                    for ($i = 0; $i < $DisasterID->count(); $i++) {
                                                                        ?>
                                                                        <tr>
                                                                            <th><?php echo $SummaryReport->getDisasterType($DisasterID->offsetGet($i)); ?></th>
                                                                            <?php
                                                                            #Regions Affected
                                                                            $RegionAffected = new ArrayObject();
                                                                            $result = $SummaryReport->RegionsAffectedOnDisaster($DisasterID->offsetGet($i));
                                                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                                                $RegionAffected->append($rows["RegionName"]);
                                                                            }
                                                                            ?>
                                                                                <th><?php
                                                                            #getting per value in ArrayObject
                                                                            for ($j = 0; $j < $RegionAffected->count(); $j++) {
                                                                                 echo $RegionAffected->offsetGet($j); 

                                                                               
                                                                            }
                                                                            ?></th> <?php
                                                                            
                                                                            #Cities Affected
                                                                            $CitiesAffected = new ArrayObject();
                                                                            $result = $SummaryReport->CityAffectedOnDisaster($DisasterID->offsetGet($i));
                                                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                                                $CitiesAffected->append($rows["CityName"] .= '<br>');
                                                                            }
                                                                            ?><th>
                                                                                <?php
                                                                            #getting per value in ArrayObject
                                                                            for ($k = 0; $k < $CitiesAffected->count(); $k++) {
                                                                                ?>
                                                                                <?php echo $CitiesAffected->offsetGet($k); ?>
                                                                                <?php
                                                                            }
                                                                            ?></th>
                                                                                <?php
                                                                            #Barangay Affected
                                                                            $BarangayAffected = new ArrayObject();
                                                                            $result = $SummaryReport->BarangayAffectedOnDisaster($DisasterID->offsetGet($i));
                                                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                                                $BarangayAffected->append($rows["BarangayName"]);
                                                                            }
                                                                            ?><th><?php
                                                                            #getting per value in ArrayObject
                                                                            for ($a = 0; $a < $BarangayAffected->count(); $a++) {
                                                                                ?>
                                                                                <?php echo $BarangayAffected->offsetGet($a).'<br>'; ?>

                                                                                <?php
                                                                            }
                                                                            ?></th><?php
                                                                            
                                                                            #Needs Per Quantity
                                                                            $NeedsType = new ArrayObject();
                                                                            $NeedsQuantity = new ArrayObject();
                                                                            $result = $SummaryReport->NeedsPerQuantityOnDisaster($DisasterID->offsetGet($i));
                                                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                                                $NeedsType->append($rows["needs"]);
                                                                                $temp=$SummaryReport->NeedsQuantity($DisasterID->offsetGet($i),$rows['needs']);
                                                                                $sumtemp=0;
                                                                                while($quantity= mysqli_fetch_assoc($temp)){
                                                                                    $sumtemp+=$quantity['quantity'];
                                                                                }
                                                                                $NeedsQuantity->append($sumtemp);
                                                                            }
                                                                            ?>
                                                                            <th>
                                                                                <?php
                                                                            #getting per value in ArrayObject
                                                                            for ($b = 0; $b < $NeedsType->count(); $b++) {
                                                                                ?>
                                                                                <?php echo $NeedsType->offsetGet($b) . ":" . $NeedsQuantity->offsetGet($b) . '<br>'; ?>

                                                                                <?php
                                                                            }
                                                                            ?></th><?php
                                                                            #No of Vicitims
                                                                            $NoOfDisasters = (int) $SummaryReport->NoOfVictimsOnDisaster($DisasterID->offsetGet($i));
                                                                            ?>
                                                                            <th><?php echo $NoOfDisasters; ?></th>


                                                                            <?php
                                                                            #No of Families
                                                                            $NoOfDisasters = $SummaryReport->NoOfFamiliesAffectedOnDisaster($DisasterID->offsetGet($i));
                                                                            ?>
                                                                            <th><?php echo $NoOfDisasters; ?></th>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>

                                                            <tfoot>
                                                            <td colspan='11' class='text-center'>
                                                            </td>
                                                            </tfoot>
                                                        </table>
                                                        </center>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </section>
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

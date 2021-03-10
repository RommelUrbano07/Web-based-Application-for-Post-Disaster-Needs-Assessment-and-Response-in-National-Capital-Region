<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <title>Edit News- Admin</title>
        <link
            rel="canonical"
            href="https://www.wrappixel.com/templates/ample-admin-lite/"
            />
        <!-- Font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
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
                                    <!--This is dark logo icon--><img src="AdminDesign_Ext/plugins/images/small-logo.png" alt="home" class="dark-logo" />
                                    <!--This is light logo icon--><img src="AdminDesign_Ext/plugins/images/small-logo.png" alt="home"
                                                                       class="light-logo lowgo" /> <span class="head-texts">irespondPH</span> </b></a>

                    </div>
                    <!-- /Logo -->
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                            <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i
                                    class="fa fa-bars"></i></a>
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
                            <h4 class="page-title" style="font-size: 20px">Edit News</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <a
                                href="../_CLIENT/index.php"
                                target="_blank"
                                class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"
                                style="background-color: orange; color: white;"
                                >Visit the Client side</a
                            >
                            <ol class="breadcrumb">
                               
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Edit News Page</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- .row -->
                    <div class="row">
                        <div class="white-box">
                            <h1 style="text-align: center; font-weight: bold; margin-bottom: 10px">Edit News Content </h1>
                             <?php 
                                $NewsID= htmlspecialchars($_REQUEST['NewsID']);
                                $temp=$_REQUEST['NewsContent'];
                                $fname=$_REQUEST['NewsFirstName'];
                                $mname=$_REQUEST['NewsMiddleName'];
                                $lname=$_REQUEST['NewsLastName'];
                                $suffix=$_REQUEST['NewsSuffix'];
                            ?>
                            <form method='POST' action='EditNewsProcess.php' class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="NewsID" value="<?php echo $NewsID; ?>">
                                        <input name='NewsAuthorFName' value="<?php echo $fname;  ?>" type='text' class="form-control" class="form-control form-control-line" placeholder="Author's First Name" title='FirstName' data-pattern='textOnly'><br>
                                        <input name='NewsAuthorMName' value="<?php echo $mname; ?>" type='text' class="form-control" class="form-control form-control-line" placeholder="Author's Middle Name" title='MiddleName' data-pattern='textOnly'><br>
                                        <input name='NewsAuthorLName' value="<?php echo $lname; ?>" type='text' class="form-control" class="form-control form-control-line" placeholder="Author's Last Name" title='LastName' data-pattern='textOnly'><br>
                                        <input name='NewsSuffix' value="<?php echo $suffix;  ?>" type='text' class="form-control" class="form-control form-control-line" placeholder="Suffix" title='Suffix' data-pattern='textOnly'><br>
                                        <textarea rows="4" cols="50" name='NewsContent' type='text' class="form-control" class="form-control form-control-line" placeholder="News Description" title='description' data-pattern='textOnly'><?php echo $temp; ?></textarea><br>
                                        <input type="submit"  class="btn btn-block waves-effect waves-light" style="background-color: orange; color: white; width: 170px; float: right"/>
                                        <a href="dashboard.php"><input type="Button" value="Back"  class="btn btn-block waves-effect waves-light" style="background-color: orange; color: white; width: 170px; float: left"/></a>
                                    </div>
                                </div>
                            
                            </form>
                            
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                <footer class="footer text-center">
                    © 2020 Ample Admin by
                    <a href="https://www.wrappixel.com/">wrappixel.com</a>
                </footer>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script>
            function myFunction() {
                var name = document.getElementById("name").value;
                var email = document.getElementById("email").value;
                var password = document.getElementById("password").value;
                $.ajax({
                    type: "POST", //type of method
                    url: "profile.php", //your page
                    data: {name: name, email: email, password: password}, // passing the values
                    success: function (data) {
                        // JUST CHECKING
                        document.write(data);
                    },
                    error: function (data) {
                        alert("Something went wrong...");
                    }
                });
            }
        </script>
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

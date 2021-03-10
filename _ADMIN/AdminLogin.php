<!DOCTYPE html>
<?php
include '../_COMMANDS/Admin_Commands.php';
$AdminCommands = new Admin_Commands();

if ($AdminCommands->checkAdminTableContent()==0) {
    header('location:registeradmin.php');
    exit();
}

?>
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
        <title>Log in - Admin</title>
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body" style="background-image: url(AdminDesign_Ext/plugins/images/disaster.jpg)">
        <div class="login-body">
            <div class="login-wrapper">
                <form method="POST" action="LoginVerifier.php" class="form">
                    <img src="AdminDesign_Ext/plugins/images/logo.png" alt="">
                    <h2 style="color: orange">Admin Log In</h2>
                    <div class="input-group" style="width: 300px">
                        <input type="text" name="AdminUsername" id="loginUser" required>
                        <label for="loginUser">Username</label>
                    </div>
                    <div class="input-group" style="width: 300px">
                        <input type="password" name="AdminPassword" id="loginPassword" required>
                        <label for="loginPassword">Password</label>
                    </div>
                    <input type="submit" value="Log In" class="submit-btn">
                    <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a>
                </form>

            </div>
        </div>
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

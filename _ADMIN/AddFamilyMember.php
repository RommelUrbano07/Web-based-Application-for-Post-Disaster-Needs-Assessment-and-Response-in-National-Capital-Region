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
        <title>iRespondPH - Add Family Member</title>
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
            href="AdminDesign_Ext/AdminDesign_Ext/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css"
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
                            <h4 class="page-title">Add Family Member</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <a
                                href="../_CLIENT/index.php"
                                target="_blank"
                                class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"
                                style="background-color: orange;color: white;"
                                >Visit Client Side</a
                            >
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Add Family Member</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <legend><h4>Add Family Member Form</h4></legend>
                                <form method='POST' action="AddFamilyProcess.php" id='forms'>
                                <input type='hidden' id='formLength' name='formLength' value='1' />
                                <div class='tab-pane' id='ls0'>
                                    <fieldset id='fs0'>
                                        <div class="form-group" >
                                            <input name='firstName' type='text' class="form-control" class="form-control form-control-line" placeholder="First Name" title='First Name' data-pattern='textOnly' required>
                                        </div>
                                        <div class="form-group">
                                            <input name='middleName' type='text' class="form-control" class="form-control form-control-line" placeholder="Middle Name" data-pattern='textOnly' required>
                                        </div>
                                        <div class="form-group">
                                            <input name='lastName' type='text' class="form-control" class="form-control form-control-line" placeholder="Last Name" data-pattern='textOnly' required>
                                        </div>
                                        <div class="form-group">
                                            <input name='suffix' type='text' class="form-control" class="form-control form-control-line" placeholder='Suffix' data-pattern='textOnly'>
                                        </div>
                                        <div class="form-group">
                                            <input name='contactNo' class="form-control" type='tel' class="form-control form-control-line" placeholder="Contact No." minlength=11 maxlength=13 title='Contact Number' data-pattern='numberOnly' required>
                                        </div>
                                        <div class="form-group">
                                            <input type='text' class="form-control" class="form-control form-control-line" placeholder='House No.' name='houseNo' title='House Number'>
                                        </div>
                                        <div class="form-group">
                                            <input type='text' class="form-control" class="form-control form-control-line" placeholder='Street Name' name='streetName' title='Street Name' required>
                                        </div>
                                        <div class="form-group">
                                            <input type='text' class="form-control" class="form-control form-control-line" placeholder='Subdivision' name='subdivision' title='Subdivision'>
                                        </div>
                                        <div class="custom-select" style='height: auto;'>
                                            <label for="gender" class="col-md-12">Birth Date </label>
                                            <input type='date' class="form-control"  class="form-control form-control-line" placeholder="Birth Date" name='birthDate' value="yyyy-mm-dd" class='birthdate' title='Birth Date' required>
                                        </div><br>
                                        <center>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <!-- BARANGAY -->
                                                    <label>Barangay</label>
                                                    <div id='barangay' name='barangay' style='height: auto;'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <!-- CITY -->
                                                    <label>City </label>
                                                    <div id='city' name='city' style='height: auto;'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <!-- REGION -->
                                                    <label>Region</label>
                                                    <select class='form-control' id='region' onchange='updateCity();' name='region' required>
                                                        <option value='ARMM' disabled>ARMM (Autonomous Region in Muslim Mindanao)</option>
                                                        <option value='CAR' disabled>CAR (Cordillera Administrative Region)</option>
                                                        <option value='NCR' selected="selected">NCR (National Capital Region)</option>
                                                        <option value='Region I' disabled>Region I (Ilocos Region)</option>
                                                        <option value='Region II' disabled>Region II (Cagayan Valley)</option>
                                                        <option value='Region III' disabled>Region III (Central Luzon)</option>
                                                        <option value='Region IV-A' disabled>Region IV-A (CALABARZON)</option>
                                                        <option value='Region IV-B' disabled>Region IV-B (MIMAROPA)</option>
                                                        <option value='Region V' disabled>Region V (Bicol Region)</option>
                                                        <option value='Region VI' disabled>Region VI (Western Visayas)</option>
                                                        <option value='Region VII' disabled>Region VII (Central Visayas)</option>
                                                        <option value='Region VIII' disabled>Region VIII (Eastern Visayas)</option>
                                                        <option value='Region IX' disabled>Region IX (Zamboanga Peninsula)</option>
                                                        <option value='Region X' disabled>Region X (Northern Mindanao)</option>
                                                        <option value='Region XI' disabled>Region XI (Davao Region)</option>
                                                        <option value='Region XII' disabled>Region XII (SOCCSKSARGEN)</option>
                                                        <option value='Region XIII' disabled>Region XIII (Caraga Region)</option>
                                                    </select>
                                                </div>
                                            </div>    
                                        </center>
                                        <center>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="gender0" class="col-md-12">Gender: </label>
                                                    <input type="radio" id="male0" name="gender" value="1" >
                                                    <label for="male0">Male</label>
                                                    <input type="radio" id="female0" name="gender" value="0">
                                                    <label for="female0">Female</label>
                                                </div>
                                            </div>
                                    </fieldset>
                                </div>
                                    <br>
                                    <div id='BTNS'>
                                        <center>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <input type="submit"  class="btn btn-block waves-effect waves-light" style="background-color: orange; color: white; width: 170px"/>  
                                            </div>
                                        </div>
                                        </center>
                                    </div>
                                    <input type="hidden" value="<?php echo htmlspecialchars($_REQUEST['FamilyID']);?>" name="FamilyID">
                                </form>
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
<script>
            // Sets the maximum date allowed.
            $(document).ready(function () {
                updateMaxDate();
                updateCity();
                updateBarangay();
                updateInputPattern();
            });
            // Variables needed for the dynamic form
            var formLength = 1;
            // Adds a field set inside the form
            function addForm() {
                // Creates the field where a new form will be appended.
                let form = $(
                        "<div class='tab-pane' id='ls" + formLength + "'>" +
                        "<fieldset id='fs"+formLength+"'>"+
                        "<div class='form-group' >"+
                        "<input name='firstName'" + formLength + "' type='text' class='form-control' class='form-control form-control-line' placeholder='First Name' title='First Name' data-pattern='textOnly' required>"+
                        "</div>"+
                        "<div class='form-group'>"+
                        "<input name='middleName"+formLength+"' type='text' class='form-control' class='form-control form-control-line' placeholder='Middle Name' data-pattern='textOnly' required>"+
                        "</div>"+            
                        "<div class='form-group'>"+
                        "<input name='lastName"+formLength+"' type='text' class='form-control' class='form-control form-control-line' placeholder='Last Name' data-pattern='textOnly' required>"+
                        "</div>"+
                        "<div class='form-group'>"+
                        "<input name='suffix"+formLength+"' type='text' class='form-control' class='form-control form-control-line' placeholder='Suffix' data-pattern='textOnly'>"+
                        "</div>"+
                        "<div class='form-group'>"+
                        "<input name='contactNo"+formLength+"' class='form-control' type='tel' class='form-control form-control-line' placeholder='Contact No.' minlength=11 maxlength=13 title='Contact Number' data-pattern='numberOnly' required>"+
                        "</div>"+
                        "<div class='custom-select' style='height: auto;'>"+
                        "<label for='gender0' class='col-md-12'>Birth Date </label>"+
                        "<input type='date' class='form-control'  class='form-control form-control-line' placeholder='Birth Date'name='birthDate"+formLength+"' value='yyyy-mm-dd' class='birthdate' title='Birth Date' required>"+
                        "</div><br>"+
                        "<center>"+
                        "<div class='form-group'>"+
                        "<div class='col-md-12'>"+
                        "<label for='gender"+formLength+"' class='col-md-12'>Gender: </label>"+
                        "<input type='radio' id='male"+formLength+"' name='gender"+formLength+"' value='male' >"+
                        "<label for='male"+formLength+"'>Male</label>"+
                        "<input type='radio' id='female"+formLength+"' name='gender"+formLength+"' value='female'>"+
                        "<label for='female"+(formLength++)+"'>Female</label>"+
                        "</div>"+
                        "</div>"+
                        "</fieldset>"+
                        "</div>"
                        );
                // Removes the buttons
                let btns = $("#BTNS");
                let btnTmp = btns;
                btns.remove();
                // Appends the form to this element.
                $("#forms").append(form);
                // Appends the button so they're at the end.
                $("#forms").append(btnTmp);
                // Updates the number of forms
                $("#formLength").attr({
                    'value': (formLength)
                });
                // Updates the max attribute for the newly added input date element
                updateMaxDate();
                // Updates the input pattern for the input elements
                updateInputPattern();
            }
            // Removes a field set inside the form
            function removeForm() {
                // If there's only a single form left.
                if (formLength == 1) {
                    alert("Cannot remove last form.");
                    return;
                }
                // Removes the recently added form
                $("#ls" + (--formLength)).remove();
                // Updates the number of forms
                $("#formLength").attr({
                    'value': (formLength)
                });
            }
            // CUSTOM METHODS
            function updateMaxDate() {
                var now = new Date();
                var month = (now.getMonth() + 1);
                var day = now.getDate();
                if (month < 10)
                    month = '0' + month;
                if (day < 10)
                    day = '0' + day;
                var date = (now.getFullYear()) + '-' + month + '-' + day;
                $('.birthdate').attr({'max': date});
            }
            // UPDATE CITY
            let oldCity, updateCityFirst = true;
            function updateCity() {
                let city, value = $("#region").children("option:selected").val().replace(/\s/g, '_'),
                        str = "<select name='city' class='form-control' id='" + value + "' onchange='updateBarangay();' required>", arr;
                if (updateCityFirst)
                    updateCityFirst = false;
                else
                    oldCity.remove();
                switch (value) {
                    case 'NCR':
                        arr = ['Caloocan', "Las Piñas", 'Makati', 'Malabon', 'Mandaluyong', "Manila City", 'Marikina', 'Muntinlupa', 'Navotas', 'Parañaque', "Pasay City", "Pasig City", 'Pateros', "Quezon City", "San Juan", 'Taguig', 'Valenzuela'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>" + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>" + arr[i] + "</option>";
                        }
                        break;
                }
                str += "</select>";
                city = $(str);
                $("#city").append(city);
                oldCity = $("#" + value);
            }
            let oldBarangay, updateBarangayFirst = true;
            function updateBarangay() {
                let barangay, value = $("#city").children('select').children("option:selected").val().replace(/\s/g, '_'),
                        str = "<select name='barangay' class='form-control' id='" + value + "' required>", arr;
                if (updateBarangayFirst)
                    updateBarangayFirst = false;
                else
                    oldBarangay.remove();
                switch (value) {
                    case 'Caloocan':
                        for (let i = 1; i < 189; i++) {
                            if (i == 1)
                                str += "<option value='Barangay_" + i + "' selected>Barangay " + i + "</option>";
                            else
                                str += "<option value='Barangay_" + i + "'>Barangay " + i + "</option>";
                        }
                        break;
                    case 'Las_Piñas':
                        arr = ["Almanza Dos", "Almanza Uno", "B. F. International Village", "Daniel Fajardo", "Elias Aldana", 'Ilaya', "Manuyo Dos", "Manuyo Uno", "Pamplona Dos", "Pamplona Tres", "Pamplona Uno", 'Pilar', "Pulang Lupa Dos", "Pulang Lupa Uno", "Talon Dos", "Talon Kuatro", "Talong Singko", "Talon Tres", "Talon Uno", 'Zapote'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Makati':
                        arr = ['Bangkal', "Bel-Air", 'Carmona', 'Cembo', 'Comembo', "Dasmariñas, East Rembo", "Forbes Park", "Guadalupe Nuevo", "Guadalupe Viejo", 'Kasilawan', "La Paz", 'Magallanes', 'Olympia', 'Palanan', 'Pembo', 'Pinagkaisahan', "Pio Del Pilar", 'Pitogo', 'Poblacion', "Post Proper Northside", "Post Proper Southside", 'Rizal', "San Antonio", "San Isidro", "San Lorenzo", "Santa Cruz", 'Signkamas', "South Cembo", 'Tejeros', 'Urdaneta', 'Valenzuela', "West Rembo"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Malabon':
                        arr = ['Acacia', 'Baritan', "Bayan-Bayanan", 'Catmon', 'Concepcion', 'Dampalit', 'Flores', "Hulong Duhat", 'Ibaba', 'Longos', 'Maysilo', 'Muzon', 'Niugan', 'Panghulo', 'Potrero', "San Agustin", 'Santolan', 'Tañong', 'Tinajeros', 'Tonsuya', 'Tugatog'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Mandaluyong':
                        arr = ["Addition Hills", "Bagong Silang", "Barangka Drive", "Barangka Ibaba", "Barangka Ilaya", "Barangka Itaas", "Buayang Bato", 'Burol', "Daang Bakal", "Hagdang Bato Itaas", "Hagdang Bato Libis", "Harapin Ang Bukas", "Highway Hills", 'Hulo', "Mabini-J. Rizal", 'Malamig', 'Mauway', 'Namayan', "New Zañiga", "Old Zañiga", "Pag-asa", 'Plainview', "Pleasant Hills", 'Poblacion', "San Jose", 'Vergara', "Wack-Wack Greenhills"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Manila_City':
                        for (let i = 1; i < 906; i++) {
                            if (i == 1)
                                str += "<option value='Barangay_" + i + "' selected>Barangay " + i + "</option>";
                            else {
                                if ((i >= 21 && i <= 24) || (i == 27) || (i == 40) || (i >= 113 && i <= 115) || (i >= 277 && i <= 280) || (i == 665) || (i == 854))
                                    continue;
                                if (i == 659 || i == 660 || i == 663 || i == 664 || i == 587 || i == 818 || i == 202)
                                    str += "<option value='Barangay_" + i + "'>Barangay " + i + "-A</option>";
                                str += "<option value='Barangay_" + i + "'>Barangay " + i + "</option>";
                            }
                        }
                        break;
                    case 'Marikina':
                        arr = ['Barangka', 'Calumpang', "Concepcion Dos", "Concepcion Uno", 'Fortune', "Industrial Valley", "Jesus De La Peña", 'Malanday', "Marikina Heights", 'Nangka', 'Parang', "San Roque", "Santa Elena", "Santo Niño", 'Tañong', 'Tumana'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Muntinlupa':
                        arr = ['Alabang', 'Bayanan', 'Buli', 'Cupang', "New Alabang Village", 'Poblacion', 'Putatan', 'Sucat', 'Tunasan'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Navotas':
                        arr = ["Bagumbayan North", "Bagumbayan South", 'Bangculasi', 'Daanghari', "Navotas East", "Navotas West", "North Bay Blvd. North", "North Bay Blvd. South", "San Jose", "San Rafael Village", "San Roque", "Sipac-Almacen", 'Tangos', 'Tanza'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Parañaque':
                        arr = ['Baclaran', "B. F. Homes", "Don Bosco", "Don Galo", "La Huerta", "Marcelo Green Village", 'Merville', 'Moonwalk', "San Antonio", "San Dionisio", "San Isidro", "San Martin De Porres", "Santo Niño", "Sun Valley", 'Tambo', 'Vitalez'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Pasay_City':
                        for (let i = 1; i < 202; i++) {
                            if (i == 1)
                                str += "<option value='" + i + "' selected>Barangay " + i + "</option>";
                            else
                                str += "<option value='" + i + "'>Barangay " + i + "</option>";
                        }
                        break;
                    case 'Pasig_City':
                        arr = ["Bagong Ilog", "Bagong Katipunan", 'Bambang', 'Buting', 'Caniogan', "Dela Paz", 'Kalawaan', 'Kapasigan', 'Kapitolyo', 'Malinao', 'Manggahan', 'Maybunga', 'Oranbo', 'Palatiw', 'Pinagbuhatan', 'Pineda', 'Rosario', 'Sagad', "San Antonio", "San Joaquin", "San Jose", "San Miguel", "San Nicolas", "Santa Cruz", "Santa Lucia", "Santa Rosa", 'Santolan', "Santo Tomas", 'Sumilang', 'Ugong'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Pateros':
                        arr = ['Aguho', 'Magtanggol', "Martires del 96", 'Poblacion', "San Pedro", "San Roque", "Santa Ana", "Santo Rosario East", "Santo Rosario West", 'Tabacalera'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Quezon_City':
                        arr = ['Alicia', 'Amihan', "Apolonio Samson", 'Aurora', 'Baesa', 'Bagbag', "Bagong Lipunan Ng Crame", "Bagong Pag-asa", "Bagong Silang", 'Bagumbayan', "Bahay Toro", 'Balingasa', "Balong Bato", "Batasan Hills", 'Bayanihan', "Blue Ridge A", "Blue Ridge B", 'Botocan', 'Bungad', "Camp Aguinaldo", 'Capri', 'Central', 'Claro', 'Commonwealth', 'Culiat', 'Damar', 'Damayan', "Damayang Lagi", "Del Monte", "Dioquino Zobel", "Doña Imelda", "Doña Josefa", "Don Manuel", "Duyan-Duyan", "East Kamias", "E. Rodriguez", "Escopa I", "Escopa II", "Escopa III", "Escopa IV", 'Fairview', "Greater Lagro", 'Gulod', "Holly Spirit", 'Horseshoe', "Immaculate Concepcion", 'Kaligayahan', 'Kalusugan', 'Kamuning', 'Katipunan', 'Kaunlaran', "Kristong Hari", "Krus Na Ligas", "Laging Handa", 'Libis', 'Lourdes', "Loyola Heights", 'Maharlika', 'Malaya', 'Mangga', 'Manresa', 'Mariana', 'Mariblo', 'Marilag', 'Masagana', 'Masambong', "Matandang Balara", 'Milagrosa', "Nagkaisang Nayon", "Nayong Kanluran", "New Era", "North Fairview", "Novaliches Proper", "N.S. Amoranto", 'Obrero', "Old Capitol Site", "Paang Bundok", "Pag-ibig sa Nayon", 'Paligsahan', 'Paltok', 'Pansol', 'Paraiso', "Pasong Putik Proper", "Pasong Tamo", 'Payatas', "Phil-Am", 'Pinagkaisahan', 'Pinyahan', "Project 6", "Quirino 2-A", "Quirino 2-B", "Quirino 2-C", "Quirino 3-A", "Ramon Magsaysay", 'Roxas', "Sacred Heart", "Saint Ignatius", "Saint Peter", 'Salvacion', "San Augustin", "San Antonio", "San Bartolome", 'Sangandaan', "San Isidro", "San Isidro Labrador", "San Jose", "San Martin De Porres", "San Roque", "Santa Cruz", "Santa Lucia", "Santa Monica", "Santa Teresita", "Santo Cristo", "Santo Domingo", 'Santol', "Santo Niño", "San Vicente", 'Sauyo', 'Sienna', "Sikatuna Village", 'Silangan', 'Socorro', "South Triangle", 'Tagumpay', 'Talayan', 'Talipapa', "Tandang Sora", 'Tatalon', "Teacehrs Village East", "Teachers Village West", "Ugong Norte", "Unang Sigaw", "U.P. Campus", "U.P. Village", 'Valencia', 'Vasra', "Veterans Village", "Villa Maria Clara", "West Kamias", "West Triangle", "White Plains"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'San_Juan':
                        arr = ["Addition Hills", "Balong-Bato", 'Batis', "Corazon de Jesus", 'Ermitaño', 'Greenhills', "Halo-halo", 'Isabelita', 'Kabayanan', "Little Baguio", 'Maytunas', 'Onse', 'Pasadeña', "Pedro Cruz", 'Progreso', 'Rivera', 'Salapan', "San Perfecto", "Santa Lucia", 'Tibagan', "West Crame"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Taguig':
                        arr = ['Bagumbayan', 'Bambang', 'Calzada', "Central Bicutan", "Cewntral Signal Village", "Fort Bonifacio", 'Hagonoy', "Ibayo-Tipas", 'Katuparan', "Ligid-Tipas", "Lower Bicutan", "Maharlika Village", 'Napindan', "New Lower Bicutan", "North Daang Hari", "North Signal Village", 'Palingon', 'Pinagsama', "San Miguel", "Santa Ana", "South Daang Hari", "South Signal Village", 'Tanyag', 'Tuktukan', "Upper Bicutan", 'Ususan', 'Wawa', "Western Bicutan"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Valenzuela':
                        arr = ["Arkong Bato", 'Bagbaguin', 'Balangkas', 'Bignay', 'Bisig', "Canumay East", "Canumay West", 'Coloong', 'Dalandanan', "Hen. T. De Leon", 'Isla', 'Karuhatan', "Lawang Bato", 'Lingunan', 'Mabolo', 'Malandsay', 'Malinta', "Mapulang Lupa", 'Marulas', 'Maysan', 'Palasan', 'Parada', "Pariancillo Villa", "Paso De Blas", 'Pasolo', 'Poblacion', 'Pulo', 'Punturin', 'Rincon', 'Tagalag', 'Ugong', "Viente Reales", "Wawang Pulo"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                }
                str += "</select>";
                barangay = $(str);
                $("#barangay").append(barangay);
                oldBarangay = $("#" + value);
            }
            function updateInputPattern() {
                const specKey = ['Escape', 'AudioVolumeMute', 'AudioVolumeUp', 'AudioVolumeDown', 'Meta', 'Backspace', 'Delete', 'Shift', 'Tab', 'CapsLock', 'Shift', 'Control', 'Alt', 'ArrowRight', 'ArrowLeft', 'ArrowUp', 'ArrowDown', 'Enter', 'F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8', 'F9', 'F10', 'F11', 'F12', 'Home', 'End', 'PageUp', 'PageDown'];
                const textOnly = /[A-Za-z\.\s]+/g;
                const numberOnly = /[\d]+/g;
                const specChar = /[\\\^\$\.\|\?\*\+\(\)\[\]\{\}/!@#%&-_=:;'"<,>~`]+/g;
                const allChar = /.+/g;
                // FOR TEXTS ONLY
                $("[data-pattern*='textOnly']").on('keydown', function (event) {
                    let tmp = "";
                    if (!textOnly.test(event.key) && !specKey.includes(event.key)) {
                        event.preventDefault();
                        tmp = ("Prevented: " + event.key);
                    }
                    tmp = (event.key);
                    tmp = ("textOnly\nPattern Match: " + textOnly.test(event.key) + "\nisSpecKey: " + specKey.includes(event.key) + "\neventKey: " + event.key + "\ntextOnly var: " + textOnly);
                });
                // FOR NUMBERS ONLY
                $("[data-pattern*='numberOnly']").on('keydown', function (event) {
                    // console.log(event.key);
                    let tmp = "";
                    if ($(this).attr('type') == 'tel') {
                        if (!numberOnly.test(event.key) && event.key != "+" && !specKey.includes(event.key)) {
                            event.preventDefault();
                            tmp = ("Prevented: " + event.key);
                        }
                    } else {
                        if (!numberOnly.test(event.key) && !specKey.includes(event.key)) {
                            event.preventDefault();
                            tmp = ("Prevented: " + event.key);
                        }
                    }
                    tmp = (event.key);
                    tmp = ("numberOnly\nPattern Match: " + numberOnly.test(event.key) + "\nisSpecKey: " + specKey.includes(event.key) + "\neventKey: " + event.key + "\nnumberOnly var: " + numberOnly);
                });
                let currentPattern = $("[data-pattern*='numberOnly']").attr('pattern');
                currentPattern = currentPattern + "";
                // console.log(currentPattern);
                // try {console.log(!~$("[data-pattern*='numberOnly']").attr('pattern').indexOf("[A-Za-z\\.\\s]+"));} catch (exception) {}
                if (currentPattern.indexOf("undefined") >= 0) {
                    // FOR NUMBERS
                    if ($("[data-pattern*='numberOnly']").attr('type') == 'tel') {
                        $("[data-pattern*='numberOnly']").attr('pattern', "^+[\\d]+");  // IF TYPE IS CONTACT
                    } else {
                        $("[data-pattern*='numberOnly']").attr('pattern', "[\\d]+");    // IF TYPE ISN'T CONTACT
                    }
                    // FOR TEXTS
                    $("[data-pattern*='textOnly']").attr('pattern', "[A-Za-z\\.\\s]+");
                    // FOR SPECIAL CHARACTERS
                    $("[data-pattern*='specChar']").attr('pattern', "[\\\\\^\\$\\.\\|\\?\\*\\+\\(\\)\\[\\]\\{\\}/!@#%&-_=:;'\"<,>~`]+");
                    // FOR ALL CHARACTERS
                    $("[data-pattern='allChar']").attr('pattern', ".{" + $("[data-pattern='allChar']").attr("pattern-min") + "," + $("[data-pattern='allChar']").attr("pattern-max") + "}");
                } else {
                    // FOR NUMBERS
                    if ($("[data-pattern*='numberOnly']").attr('pattern').indexOf("[\\d]+") >= 0)
                        $("[data-pattern*='numberOnly']").attr('pattern', $("[data-pattern*='numberOnly']").attr('pattern') + "[\\d]+");
                    // FOR TEXTS
                    if ($("[data-pattern*='numberOnly']").attr('pattern').indexOf("[A-Za-z\\.\\s]+") >= 0)
                        $("[data-pattern*='textOnly']").attr('pattern', $("[data-pattern*='textOnly']").attr('pattern') + "[A-Za-z\\.\\s]+");
                    // FOR SPECIAL CHARACTERS
                    if ($("[data-pattern*='numberOnly']").attr('pattern').indexOf("[\\\\\^\\$\\.\\|\\?\\*\\+\\(\\)\\[\\]\\{\\}/!@#%&-_=:;'\"<,>~`]+") >= 0)
                        $("[data-pattern*='specChar']").attr('pattern', $("[data-pattern*='specChar']").attr('pattern') + "[\\\\\^\\$\\.\\|\\?\\*\\+\\(\\)\\[\\]\\{\\}/!@#%&-_=:;'\"<,>~`]+");
                    // FOR ALL CHARACTERS
                    if ($("[data-pattern*='numberOnly']").attr('pattern').indexOf(".{" + $("[data-pattern='allChar']").attr("pattern-min") + "," + $("[data-pattern='allChar']").attr("pattern-max") + "}") >= 0)
                        $("[data-pattern='allChar']").attr('pattern', ".{" + $("[data-pattern='allChar']").attr("pattern-min") + "," + $("[data-pattern='allChar']").attr("pattern-max") + "}");
                }
                /* SPECIAL CASE: If the input is the suffix
                 * If the element is focused, it will add the 'required' attribute.
                 * If it is unfocused, it will then remove the 'required' attribute.
                 * REASON:
                 * Adding the 'required' attribute allows the 'pattern' attribute to work;
                 * but at the same time, this will require the user to provide a value. Suffix is
                 * an optional value in people's name thus, the code below. If focused, the user will
                 * be forced to follow the pattern but will not allow the form to be submitted when it is blank.
                 * If it is unfocused after being traversed or something, it will remove the 'required' tag
                 * which would render the 'pattern' attribute useless, but will allow the form to submit the
                 * value despite being blank.
                 */
                $("[name='suffix']").focus(function () {
                    $(this).attr('required', 'required');
                });
                $("[name='suffix']").focusout(function () {
                    $(this).removeAttr('required');
                });
                for (let i = 0; i < formLength; i++) {
                    $("[name='suffix']").focus(function () {
                        $(this).attr('required', 'required');
                    });
                    $("[name='suffix']").focusout(function () {
                        $(this).removeAttr('required');
                    });
                }
            }
        </script>
</body>
</html>

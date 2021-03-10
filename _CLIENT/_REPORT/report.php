<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>iRespondPH - Report a Disaster</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../../lib/Client/images/logo.png" rel="icon" />
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="../../lib/Client/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="../../lib/Client/css/animate.css">

        <link rel="stylesheet" href="../../lib/Client/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../../lib/Client/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../../lib/Client/css/magnific-popup.css">

        <link rel="stylesheet" href="../../lib/Client/css/aos.css">

        <link rel="stylesheet" href="../../lib/Client/css/ionicons.min.css">

        <link rel="stylesheet" href="../../lib/Client/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="../../lib/Client/css/jquery.timepicker.css">


        <link rel="stylesheet" href="../../lib/Client/css/flaticon.css">
        <link rel="stylesheet" href="../../lib/Client/css/icomoon.css">
        <link rel="stylesheet" href="../../lib/Client/css/style.css">
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    </head>
    <style>
        /* -----------------------------------------
   Timeline
----------------------------------------- */
        .timeline {
            list-style: none;
            padding-left: 0;
            position: relative;
        }
        .timeline:after {
            content: "";
            height: auto;
            width: 1px;
            background: #e3e3e3;
            position: absolute;
            top: 5px;
            left: 30px;
            bottom: 25px;
        }
        .timeline.timeline-sm:after {
            left: 12px;
        }
        .timeline li {
            position: relative;
            padding-left: 70px;
            margin-bottom: 20px;
        }
        .timeline li:after {
            content: "";
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #e3e3e3;
            position: absolute;
            left: 24px;
            top: 5px;
        }
        .timeline li .timeline-date {
            display: inline-block;
            width: 100%;
            color: #a6a6a6;
            font-style: italic;
            font-size: 13px;
        }
        .timeline.timeline-icons li {
            padding-top: 7px;
        }
        .timeline.timeline-icons li:after {
            width: 32px;
            height: 32px;
            background: #fff;
            border: 1px solid #e3e3e3;
            left: 14px;
            top: 0;
            z-index: 11;
        }
        .timeline.timeline-icons li .timeline-icon {
            position: absolute;
            left: 23.5px;
            top: 7px;
            z-index: 12;
        }
        .timeline.timeline-icons li .timeline-icon [class*=glyphicon] {
            top: -1px !important;
        }
        .timeline.timeline-icons.timeline-sm li {
            padding-left: 40px;
            margin-bottom: 10px;
        }
        .timeline.timeline-icons.timeline-sm li:after {
            left: -5px;
        }
        .timeline.timeline-icons.timeline-sm li .timeline-icon {
            left: 4.5px;
        }
        .timeline.timeline-advanced li {
            padding-top: 0;
        }
        .timeline.timeline-advanced li:after {
            background: #fff;
            border: 1px solid #29b6d8;
        }
        .timeline.timeline-advanced li:before {
            content: "";
            width: 52px;
            height: 52px;
            border: 10px solid #fff;
            position: absolute;
            left: 4px;
            top: -10px;
            border-radius: 50%;
            z-index: 12;
        }
        .timeline.timeline-advanced li .timeline-icon {
            color: #29b6d8;
        }
        .timeline.timeline-advanced li .timeline-date {
            width: 75px;
            position: absolute;
            right: 5px;
            top: 3px;
            text-align: right;
        }
        .timeline.timeline-advanced li .timeline-title {
            font-size: 17px;
            margin-bottom: 0;
            padding-top: 5px;
            font-weight: bold;
        }
        .timeline.timeline-advanced li .timeline-subtitle {
            display: inline-block;
            width: 100%;
            color: #a6a6a6;
        }
        .timeline.timeline-advanced li .timeline-content {
            margin-top: 10px;
            margin-bottom: 10px;
            padding-right: 70px;
        }
        .timeline.timeline-advanced li .timeline-content p {
            margin-bottom: 3px;
        }
        .timeline.timeline-advanced li .timeline-content .divider-dashed {
            padding-top: 0px;
            margin-bottom: 7px;
            width: 200px;
        }
        .timeline.timeline-advanced li .timeline-user {
            display: inline-block;
            width: 100%;
            margin-bottom: 10px;
        }
        .timeline.timeline-advanced li .timeline-user:before,
        .timeline.timeline-advanced li .timeline-user:after {
            content: " ";
            display: table;
        }
        .timeline.timeline-advanced li .timeline-user:after {
            clear: both;
        }
        .timeline.timeline-advanced li .timeline-user .timeline-avatar {
            border-radius: 50%;
            width: 32px;
            height: 32px;
            float: left;
            margin-right: 10px;
        }
        .timeline.timeline-advanced li .timeline-user .timeline-user-name {
            font-weight: bold;
            margin-bottom: 0;
        }
        .timeline.timeline-advanced li .timeline-user .timeline-user-subtitle {
            color: #a6a6a6;
            margin-top: -4px;
            margin-bottom: 0;
        }
        .timeline.timeline-advanced li .timeline-link {
            margin-left: 5px;
            display: inline-block;
        }
        .timeline-load-more-btn {
            margin-left: 70px;
        }
        .timeline-load-more-btn i {
            margin-right: 5px;
        }


        /* -----------------------------------------
           Dropdown
        ----------------------------------------- */
        .dropdown-menu{
            padding:0 0 0 0;
        }
        a.dropdown-menu-header {
            background: #f7f9fe;
            font-weight: bold;
            border-bottom: 1px solid #e3e3e3;
        }
        .dropdown-menu > li a {
            padding: 10px 20px;
        }

        /* -----------------------------------------
           Badge
        ----------------------------------------- */

        .badge{
            padding: 3px 5px 2px;
            position: absolute;
            top: 8px;
            right: 5px;
            display: inline-block;
            min-width: 10px;
            font-size: 12px;
            font-weight: bold;
            color: #ffffff;
            line-height: 1;
            vertical-align: baseline;
            white-space: nowrap;
            text-align: center;
            border-radius: 10px;
        }
        .badge-danger {
            background-color: #db5565;
        }
        .ScrollStyle
        {
            max-height: 500px;
            overflow-y: scroll;
        }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <img src="../../lib/Client/images/logo.png" class="logo" alt="" />
                <a class="navbar-brand" href="../index.php">iRespond<span>PH</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <div class="dropdown" style="float: right; padding: 13px">
                                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                    <i class="fa fa-bell" style="font-size: 23px; color: orange; margin-top: 20px;">
                                    </i>
                                </a>
                                <span class="badge badge-danger" style="margin-top: 20px;">!</span>
                                <ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
                                    <div class="ScrollStyle">
                                    <li role="presentation">
                                        <br>
                                        <a href="#" style="margin-left: 20px; font-size: 20px;">Notifications</a>
                                    </li>
                                     <ul class="timeline timeline-icons timeline-sm" style="margin:50px;width:200px">
                                       <?php 
                                        include '../../_COMMANDS/Notifications.php';
                                        $Notification= new Notifications();
                                        
                                        $UserID= $Notification->returnSpecificCustomerID($_SESSION['Username'], $_SESSION['Password']);
                                        $result = $Notification->getNotifications($UserID);
                                        while($rows=mysqli_fetch_assoc($result)){
                                        ?>
                                         <li>
                                            <p>
                                                <?php echo $rows['NotificationContent'] ; ?>
                                                <span class="timeline-icon"><i class="fa fa-envelope"  style="color:orange"></i></span>
                                                <span class="timeline-date"><?php echo $rows['NotificationDate'].' '.$rows['NotificationTime'] ; ?></span>
                                            </p>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item active"><a href="../../_CLIENT/_REPORT/report.php" class="nav-link">Report</a></li>
                        <li class="nav-item"><a href="../../_CLIENT/_DONATE/donate.php" class="nav-link">Donate</a></li>
                        <li class="nav-item"><a href="../index.php" class="nav-link">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->

        <section class="hero-wrap hero-wrap-2" style="background-image: url('../../lib/Client/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                    <div class="col-md-9 ftco-animate pb-5 text-center">
                        <h2 class="mb-3 bread">Report a Disaster</h2>
                        <p>Report a disaster and request for an assistance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
        <div class="container-fluid px-0">
            <div class="row no-gutters block-9">
                <div class="col-md-12 offset-md-0"> 
                    <form action="reportPROCESS.php" method="POST" class="bg-light p-5 contact-form">
                        <input type='number' style='display: none;' value='1' name='formPersonLength' id='formPersonLength' readonly>
                        <h4 class="info-text">Details of the Disaster </h4>
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="form-group">
                                    <label for='disaster'>Type of Disaster </label>
                                    <select id='disaster' name='disaster' class="form-control" title='What disaster struck your place?' required>
                                        <option value="Drought">Drought</option>
                                        <option value="Earthquake">Earthquake</option>
                                        <option value="Flood">Flood</option>
                                        <option value="Hurricane">Hurricane</option>
                                        <option value="Landslides">Landslides</option>
                                        <option value="Sinkhole">Sinkhole</option>
                                        <option value="Tornado">Tornado</option>
                                        <option value="Tsunami">Tsunami</option>
                                        <option value="Typhoon">Typhoon</option>
                                        <option value="Volcanic Eruption">Volcanic Eruption</option>
                                        <option value="Wildfire">Wildfire</option>
                                    </select><br>
                                </div>
                            </div>               
                            <div class="col-sm-8 ">
                                <div class="form-group">
                                    <label for='message'>Message</label><br>
                                    <textarea placeholder="Message" id='message' class='form-control' name='message' style='resize: none;' rows=10 cols=50 title='Your message'></textarea><br>
                                </div>
                            </div>
                        </div>
                        <h4 class="info-text"> Location of the Disaster </h4>
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-1">
                                <div class="form-group">
                                    <!-- HOUSE NO -->
                                    <label>House No. </label>
                                    <input type='text' class="form-control" placeholder='House No.' name='houseNo' title='House Number'>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <!-- STREET NAME -->
                                    <label>Street Name </label>
                                    <input type='text' class="form-control" placeholder='Street Name' name='streetName' title='Street Name' required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <!-- SUBDIVISION -->
                                    <label>Subdivision </label>
                                    <input type='text' class="form-control" placeholder='Subdivision' name='subdivision' title='Subdivision'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <div class="form-group">
                                    <!-- BARANGAY -->
                                    <label>Barangay</label>
                                    <div id='barangay'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <!-- CITY -->
                                    <label>City </label>
                                    <div id='city'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <!-- REGION -->
                                    <label>Region</label>
                                    <select name='region' class='form-control' id='region' onchange='updateCity();' required>
                                        <option value='ARMM' disabled>ARMM (Autonomous Region in Muslim Mindanao)</option>
                                        <option value='CAR' disabled>CAR (Cordillera Administrative Region)</option>
                                        <option value='NCR' selected>NCR (National Capital Region)</option>
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
                            <div class="col-sm-10 col-sm-offset-1">     
                            </div>
                        </div>                                        
                        <h4 class="info-text"> Victim Information </h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-group list-group-flush" id='affected'>
                                    <li id='person0' class="list-group-item">
                                        <ul class='list-group list-group-horizontal'>
                                            <!-- FIRST NAME -->
                                            <li class='list-group-item'>
                                                <label>First Name </label>
                                                <input type='text' class='form-control' placeholder='First Name' name='firstName0' title='First Name' data-pattern="textOnly" required><br>
                                            </li>
                                            <!-- MIDDLE NAME -->
                                            <li class='list-group-item'>
                                                <label>Middle Name </label>
                                                <input type='text' class='form-control' placeholder='Middle Name' name='middleName0' title='Middle Name' data-pattern="textOnly" required><br>
                                            </li>
                                            <!-- LAST NAME -->
                                            <li class='list-group-item'>
                                                <label>Last Name </label>
                                                <input type='text' class='form-control' placeholder='Last Name' name='lastName0' title='Last Name' data-pattern="textOnly" required><br>
                                            </li>
                                            <!-- SUFFIX -->
                                            <li class='list-group-item'>
                                                <label>Suffix </label>
                                                <input type='text' class='form-control' placeholder="Suffix" name='suffix0' title='Suffix' data-pattern="textOnly"><br>
                                            </li>
                                        </ul>
                                    </li>
                                </ul> 
                            </div>
                        </div>
                        <div class="col-md-2 offset-md-5"> 
                            <input type='button' class='form-control' id='addForm0' value='Add Person' onclick='addForm(0)'/>
                            <input type='button' class='form-control' id='remForm0' value='Remove Person' onclick='removeForm(0)' disabled/>
                        </div>
                        <br><br>
                        <input type='number' style='display: none;' value='1' name='formNeedsLength' id='formNeedsLength' readonly>
                        <h4 class="info-text"> Victim Needs </h4>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <ul class="list-group list-group-flush" id='needsUL'>
                                        <li id='needsForm0' class="list-group-item">
                                            <select id='needs0' class='form-control' name='needs0' title='What items are in immediate need?' required>
                                                <option value='food'>Food</option> 
                                                <option value='water'>Water</option> 
                                                <option value='clothes'>Clothes</option>
                                                <option value='medical'>Medical Assistance/Items</option>
                                                <option value='toiletries'>Toiletries</option>
                                                <option value='kitchenware'>Kitchenware</option>
                                                <option value='bedding'>Bedding</option>
                                                <option value='mattress'>Mattress</option>
                                            </select>
                                            <input type='number' class='form-control' name='needsAmt0' placeholder="Quantity" style='width: 100px; text-align: center;' min="1" required>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 offset-md-5"> 
                            <input type='button' id='addForm1' class="form-control" value='Add Needs' onclick='addForm(1)'/>
                            <input type='button' id='remForm1' class="form-control" value='Remove Needs' onclick='removeForm(1)' disabled/>
                        </div>
                        <br>
                        <div class = "row">
                            <div class="col-md-2 offset-md-5"> 
                                <div class="form-group">
                                    <input type="submit" value="Submit Report" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">
                            <a>iRespond<span>PH</span></a>
                        </h2>
                        <p>
                            A Post Disaster Management System that responds to the needs of victims of the disasters
                        </p>
                        <ul
                            class="ftco-footer-social list-unstyled float-md-left float-lft mt-5"
                            >
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Donation</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy</a></li>
                            <li><a href="#" class="py-2 d-block">Terms Condition</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="index.php" class="py-2 d-block">Home</a></li>
                            <li><a href="about.php" class="py-2 d-block">Who we are</a></li>
                            <li><a href="blog.php" class="py-2 d-block">Stories</a></li>
                            <li><a href="contact.php" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="icon icon-map-marker"></span
                                    ><span class="text"
                                           >551 M.F. Jhocson St, Sampaloc, Manila, 1008 Metro Manila</span
                                    >
                                </li>
                                <li>
                                    <a href="#"
                                       ><span class="icon icon-phone"></span
                                        ><span class="text">0944 444 4444</span></a
                                    >
                                </li>
                                <li>
                                    <a href="#"
                                       ><span class="icon icon-envelope"></span
                                        ><span class="text">irespondph@gmail.com</span></a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved 
                        <a href="https://colorlib.com" target="_blank"></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="../../lib/Client/js/jquery.min.js"></script>
    <script src="../../lib/Client/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../../lib/Client/js/popper.min.js"></script>
    <script src="../../lib/Client/js/bootstrap.min.js"></script>
    <script src="../../lib/Client/js/jquery.easing.1.3.js"></script>
    <script src="../../lib/Client/js/jquery.waypoints.min.js"></script>
                                    <script src="../../lib/Client/js/jquery.stellar.min.js"></script>
                                    <script src="../../lib/Client/js/owl.carousel.min.js"></script>
                            <script src="../../lib/Client/js/jquery.magnific-popup.min.js"></script>
                            <script src="../../lib/Client/js/aos.js"></script>
                            <script src="../../lib/Client/js/jquery.animateNumber.min.js"></script>
                            <script src="../../lib/Client/js/scrollax.min.js"></script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
                            <script src="../../lib/Client/js/google-map.js"></script>     <script src="../../lib/Client/js/main.js"></script>
<script>
                                    // Sets the maximum date allowed.
                                    $(document).ready(function () {
                                        updateCity();
                                        updateBarangay();
                                        updateInputPattern();
                                    });
                                    // CUSTOM METHODS
                                    // UPDATE CITY
                                    let oldCity, updateCityFirst = true;
                                    function updateCity() {
                                        let city, value = $("#region").children("option:selected").val().replace(/\s/g, "_"),
                                                str = "<select name='city' class='form-control'  id='" + value + "' onchange='updateBarangay();' required>", arr;
                                        if (updateCityFirst)
                                            updateCityFirst = false;
                                        else
                                            oldCity.remove();
                                        switch (value) {
                                            case "NCR":
                                                arr = ["Caloocan", "Las Piñas", "Makati", "Malabon", "Mandaluyong", "Manila City", "Marikina", "Muntinlupa", "Navotas", "Parañaque", "Pasay City", "Pasig City", "Pateros", "Quezon City", "San Juan", "Taguig", "Valenzuela"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>" + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>" + arr[i] + "</option>";
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
                                        let barangay, value = $("#city").children("select").children("option:selected").val().replace(/\s/g, "_"),
                                                str = "<select name='barangay' class='form-control'  id='" + value + "' required>", arr;
                                        if (updateBarangayFirst)
                                            updateBarangayFirst = false;
                                        else
                                            oldBarangay.remove();
                                        switch (value) {
                                            case "Caloocan":
                                                for (let i = 1; i < 189; i++) {
                                                    if (i == 1)
                                                        str += "<option value='Barangay_" + i + "' selected>Barangay " + i + "</option>";
                                                    else
                                                        str += "<option value='Barangay_" + i + "'>Barangay " + i + "</option>";
                                                }
                                                break;
                                            case "Las_Piñas":
                                                arr = ["Almanza Dos", "Almanza Uno", "B. F. International Village", "Daniel Fajardo", "Elias Aldana", "Ilaya", "Manuyo Dos", "Manuyo Uno", "Pamplona Dos", "Pamplona Tres", "Pamplona Uno", "Pilar", "Pulang Lupa Dos", "Pulang Lupa Uno", "Talon Dos", "Talon Kuatro", "Talong Singko", "Talon Tres", "Talon Uno", "Zapote"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Makati":
                                                arr = ["Bangkal", "Bel-Air", "Carmona", "Cembo", "Comembo", "Dasmariñas, East Rembo", "Forbes Park", "Guadalupe Nuevo", "Guadalupe Viejo", "Kasilawan", "La Paz", "Magallanes", "Olympia", "Palanan", "Pembo", "Pinagkaisahan", "Pio Del Pilar", "Pitogo", "Poblacion", "Post Proper Northside", "Post Proper Southside", "Rizal", "San Antonio", "San Isidro", "San Lorenzo", "Santa Cruz", "Signkamas", "South Cembo", "Tejeros", "Urdaneta", "Valenzuela", "West Rembo"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Malabon":
                                                arr = ["Acacia", "Baritan", "Bayan-Bayanan", "Catmon", "Concepcion", "Dampalit", "Flores", "Hulong Duhat", "Ibaba", "Longos", "Maysilo", "Muzon", "Niugan", "Panghulo", "Potrero", "San Agustin", "Santolan", "Tañong", "Tinajeros", "Tonsuya", "Tugatog"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Mandaluyong":
                                                arr = ["Addition Hills", "Bagong Silang", "Barangka Drive", "Barangka Ibaba", "Barangka Ilaya", "Barangka Itaas", "Buayang Bato", "Burol", "Daang Bakal", "Hagdang Bato Itaas", "Hagdang Bato Libis", "Harapin Ang Bukas", "Highway Hills", "Hulo", "Mabini-J. Rizal", "Malamig", "Mauway", "Namayan", "New Zañiga", "Old Zañiga", "Pag-asa", "Plainview", "Pleasant Hills", "Poblacion", "San Jose", "Vergara", "Wack-Wack Greenhills"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Manila_City":
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
                                            case "Marikina":
                                                arr = ["Barangka", "Calumpang", "Concepcion Dos", "Concepcion Uno", "Fortune", "Industrial Valley", "Jesus De La Peña", "Malanday", "Marikina Heights", "Nangka", "Parang", "San Roque", "Santa Elena", "Santo Niño", "Tañong", "Tumana"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Muntinlupa":
                                                arr = ["Alabang", "Bayanan", "Buli", "Cupang", "New Alabang Village", "Poblacion", "Putatan", "Sucat", "Tunasan"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Navotas":
                                                arr = ["Bagumbayan North", "Bagumbayan South", "Bangculasi", "Daanghari", "Navotas East", "Navotas West", "North Bay Blvd. North", "North Bay Blvd. South", "San Jose", "San Rafael Village", "San Roque", "Sipac-Almacen", "Tangos", "Tanza"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Parañaque":
                                                arr = ["Baclaran", "B. F. Homes", "Don Bosco", "Don Galo", "La Huerta", "Marcelo Green Village", "Merville", "Moonwalk", "San Antonio", "San Dionisio", "San Isidro", "San Martin De Porres", "Santo Niño", "Sun Valley", "Tambo", "Vitalez"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Pasay_City":
                                                for (let i = 1; i < 202; i++) {
                                                    if (i == 1)
                                                        str += "<option value='" + i + "' selected>Barangay " + i + "</option>";
                                                    else
                                                        str += "<option value='" + i + "'>Barangay " + i + "</option>";
                                                }
                                                break;
                                            case "Pasig_City":
                                                arr = ["Bagong Ilog", "Bagong Katipunan", "Bambang", "Buting", "Caniogan", "Dela Paz", "Kalawaan", "Kapasigan", "Kapitolyo", "Malinao", "Manggahan", "Maybunga", "Oranbo", "Palatiw", "Pinagbuhatan", "Pineda", "Rosario", "Sagad", "San Antonio", "San Joaquin", "San Jose", "San Miguel", "San Nicolas", "Santa Cruz", "Santa Lucia", "Santa Rosa", "Santolan", "Santo Tomas", "Sumilang", "Ugong"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Pateros":
                                                arr = ["Aguho", "Magtanggol", "Martires del 96", "Poblacion", "San Pedro", "San Roque", "Santa Ana", "Santo Rosario East", "Santo Rosario West", "Tabacalera"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Quezon_City":
                                                arr = ["Alicia", "Amihan", "Apolonio Samson", "Aurora", "Baesa", "Bagbag", "Bagong Lipunan Ng Crame", "Bagong Pag-asa", "Bagong Silang", "Bagumbayan", "Bahay Toro", "Balingasa", "Balong Bato", "Batasan Hills", "Bayanihan", "Blue Ridge A", "Blue Ridge B", "Botocan", "Bungad", "Camp Aguinaldo", "Capri", "Central", "Claro", "Commonwealth", "Culiat", "Damar", "Damayan", "Damayang Lagi", "Del Monte", "Dioquino Zobel", "Doña Imelda", "Doña Josefa", "Don Manuel", "Duyan-Duyan", "East Kamias", "E. Rodriguez", "Escopa I", "Escopa II", "Escopa III", "Escopa IV", "Fairview", "Greater Lagro", "Gulod", "Holly Spirit", "Horseshoe", "Immaculate Concepcion", "Kaligayahan", "Kalusugan", "Kamuning", "Katipunan", "Kaunlaran", "Kristong Hari", "Krus Na Ligas", "Laging Handa", "Libis", "Lourdes", "Loyola Heights", "Maharlika", "Malaya", "Mangga", "Manresa", "Mariana", "Mariblo", "Marilag", "Masagana", "Masambong", "Matandang Balara", "Milagrosa", "Nagkaisang Nayon", "Nayong Kanluran", "New Era", "North Fairview", "Novaliches Proper", "N.S. Amoranto", "Obrero", "Old Capitol Site", "Paang Bundok", "Pag-ibig sa Nayon", "Paligsahan", "Paltok", "Pansol", "Paraiso", "Pasong Putik Proper", "Pasong Tamo", "Payatas", "Phil-Am", "Pinagkaisahan", "Pinyahan", "Project 6", "Quirino 2-A", "Quirino 2-B", "Quirino 2-C", "Quirino 3-A", "Ramon Magsaysay", "Roxas", "Sacred Heart", "Saint Ignatius", "Saint Peter", "Salvacion", "San Augustin", "San Antonio", "San Bartolome", "Sangandaan", "San Isidro", "San Isidro Labrador", "San Jose", "San Martin De Porres", "San Roque", "Santa Cruz", "Santa Lucia", "Santa Monica", "Santa Teresita", "Santo Cristo", "Santo Domingo", "Santol", "Santo Niño", "San Vicente", "Sauyo", "Sienna", "Sikatuna Village", "Silangan", "Socorro", "South Triangle", "Tagumpay", "Talayan", "Talipapa", "Tandang Sora", "Tatalon", "Teacehrs Village East", "Teachers Village West", "Ugong Norte", "Unang Sigaw", "U.P. Campus", "U.P. Village", "Valencia", "Vasra", "Veterans Village", "Villa Maria Clara", "West Kamias", "West Triangle", "White Plains"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "San_Juan":
                                                arr = ["Addition Hills", "Balong-Bato", "Batis", "Corazon de Jesus", "Ermitaño", "Greenhills", "Halo-halo", 'Isabelita', "Kabayanan", "Little Baguio", "Maytunas", "Onse", "Pasadeña", "Pedro Cruz", "Progreso", "Rivera", "Salapan", "San Perfecto", "Santa Lucia", "Tibagan", "West Crame"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Taguig":
                                                arr = ["Bagumbayan", "Bambang", "Calzada", "Central Bicutan", "Cewntral Signal Village", "Fort Bonifacio", "Hagonoy", "Ibayo-Tipas", "Katuparan", "Ligid-Tipas", "Lower Bicutan", "Maharlika Village", "Napindan", "New Lower Bicutan", "North Daang Hari", "North Signal Village", "Palingon", "Pinagsama", "San Miguel", "Santa Ana", "South Daang Hari", "South Signal Village", "Tanyag", "Tuktukan", "Upper Bicutan", "Ususan", "Wawa", "Western Bicutan"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                            case "Valenzuela":
                                                arr = ["Arkong Bato", "Bagbaguin", "Balangkas", "Bignay", "Bisig", "Canumay East", "Canumay West", "Coloong", "Dalandanan", "Hen. T. De Leon", "Isla", "Karuhatan", "Lawang Bato", "Lingunan", "Mabolo", "Malandsay", "Malinta", "Mapulang Lupa", "Marulas", "Maysan", "Palasan", "Parada", "Pariancillo Villa", "Paso De Blas", "Pasolo", "Poblacion", "Pulo", "Punturin", "Rincon", "Tagalag", "Ugong", "Viente Reales", "Wawang Pulo"];
                                                for (let i = 0; i < arr.length; i++) {
                                                    if (i == 0)
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "' selected>Barangay " + arr[i] + "</option>";
                                                    else
                                                        str += "<option value='" + arr[i].replace(/\s/g, "_") + "'>Barangay " + arr[i] + "</option>";
                                                }
                                                break;
                                        }
                                        str += "</select>";
                                        barangay = $(str);
                                        $("#barangay").append(barangay);
                                        oldBarangay = $("#" + value);
                                    }
                                    // Variables needed for the dynamic form
                                    var formPersonLength = 1, formNeedsLength = 1;
                                    // Adds a field set inside the form
                                    function addForm(formNo) {
                                        if (formNo === 0) {
                                            // Creates the field where a new form will be appended.
                                            let form = $(
                                                    "<li id='person" + formPersonLength + "' class='list-group-item'>" +
                                                    "<ul class='list-group list-group-horizontal'>" +
                                                    "<li class='list-group-item'>" +
                                                    "<label>First Name <small>(required)</small></label>" +
                                                    "<input type='text' class='form-control' placeholder='First Name' name='firstName" + formPersonLength + "' title='First Name' data-pattern='textOnly' required><br>" +
                                                    "</li>" +
                                                    "<li class='list-group-item'>" +
                                                    "<label>Middle Name <small>(required)</small></label>" +
                                                    "<input type='text' class='form-control' placeholder='Middle Name' name='middleName" + formPersonLength + "' title='Middle Name' data-pattern='textOnly' required><br>" +
                                                    "</li>" +
                                                    "<li class='list-group-item'>" +
                                                    "<label>Last Name <small>(required)</small></label>" +
                                                    "<input type='text' class='form-control' placeholder='Last Name' name='lastName" + formPersonLength + "' title='Last Name' data-pattern='textOnly' required><br>" +
                                                    "</li>" +
                                                    "<li class='list-group-item'>" +
                                                    "<label>Suffix </label>" +
                                                    "<input type='text' class='form-control' placeholder='Suffix' name='suffix" + (formPersonLength++) + "' title='Suffix' data-pattern='textOnly'><br>" +
                                                    "</li>" +
                                                    "</ul>" +
                                                    "</li>"
                                                    );
                                            // Appends the form to this element.
                                            $("#affected").append(form);
                                            // Updates the number of forms
                                            $("#formPersonLength").attr({
                                                "value": (formPersonLength)
                                            });
                                            if (formPersonLength > 1) {
                                                $(("#remForm" + formNo)).attr({
                                                    disabled: false
                                                });
                                            }
                                        } else if (formNo === 1) {
                                            let lines = ["<option value='food'>Food</option>", "<option value='water'>Water</option>", "<option value='clothes'>Clothes</option>", "<option value='medical'>Medical Assistance/Items</option>", "<option value='toiletries'>Toiletries</option>", "<option value='kitchenware'>Kitchenware</option>", "<option value='bedding'>Bedding</option>", "<option value='mattress'>Mattress</option>"];
                                            let str = "", essentials = [["food", lines[0]], ["water", lines[1]], ["clothes", lines[2]], ["medical", lines[3]], ["toiletries", lines[4]], ["kitchenware", lines[5]], ["bedding", lines[6]], ["mattress", lines[7]]];
                                            // Removes the item in the essentials list if it's already selected
                                            for (let i = 0; i < $("#needsUL").children().length; i++) {
                                                essentials = $.grep(essentials, function (value, index) {
                                                    return $("#needs" + i).val() != essentials[index][0];
                                                });
                                            }
                                            // alert(essentials);
                                            // Inserts the lines needed for the drop-down.
                                            $.each(essentials, function (index, value) {
                                                str += essentials[index][1];
                                            });
                                            // alert(str);
                                            // Actually creates and inserts the new form.
                                            if (formNeedsLength < 9) {
                                                let form = $(
                                                        "<li id='needsForm" + formNeedsLength + "' class='list-group-item'>" +
                                                        "<select id='needs" + formNeedsLength + "' class='form-control' name='needs" + formNeedsLength + "'  title='What items are in immediate need?' required>" +
                                                        str +
                                                        "</select>" +
                                                        "<input type='number' class='form-control' name='needsAmt" + (formNeedsLength++) + "' placeholder='Quantity' style='width: 100px; text-align: center;' min='1' required>" +
                                                        "</li>"
                                                        );
                                                $("#needsUL").append(form);
                                                $("#formNeedsLength").attr({
                                                    "value": (formNeedsLength)
                                                });
                                                if (formNeedsLength === 8) {
                                                    $(("#addForm" + formNo)).attr({
                                                        disabled: true
                                                    });
                                                } else if (formNeedsLength > 1) {
                                                    $(("#remForm" + formNo)).attr({
                                                        disabled: false
                                                    });
                                                }
                                            }
                                        }
                                        updateInputPattern();
                                    }
                                    // Removes a field set inside the form
                                    function removeForm(formNo) {
                                        if (formNo === 0) {
                                            // If there's only a single form left.
                                            if (formPersonLength === 1) {
                                                $(("#addForm" + formNo)).attr({
                                                    disabled: false
                                                });
                                            }
                                            // Removes the recently added form
                                            $("#person" + (--formPersonLength)).remove();
                                            // Updates the number of forms
                                            $("#formPersonLength").attr({
                                                "value": (formPersonLength)
                                            });
                                            if (formPersonLength > 1) {
                                                $(("#remForm" + formNo)).attr({
                                                    disabled: false
                                                });
                                            } else if (formPersonLength <= 1) {
                                                $(("#remForm" + formNo)).attr({
                                                    disabled: true
                                                });
                                            }
                                        } else if (formNo === 1) {
                                            // If there's only a single form left.
                                            if (formNeedsLength < 3) {
                                                $(("#addForm" + formNo)).attr({
                                                    disabled: false
                                                });
                                                $(("#remForm" + formNo)).attr({
                                                    disabled: true
                                                });
                                            }
                                            // Removes the recently added form
                                            $("#needsForm" + (--formNeedsLength)).remove();
                                            // Updates the "Add Form" button: set to be enabled once more.
                                            if (formNeedsLength < 8) {
                                                $(("#addForm" + formNo)).attr({
                                                    disabled: false
                                                });
                                            }
                                            // Updates the number of forms
                                            $("#formNeedsLength").attr({
                                                "value": (formNeedsLength)
                                            });
                                        }
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
                                        for (let i = 0; i < formPersonLength; i++) {
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
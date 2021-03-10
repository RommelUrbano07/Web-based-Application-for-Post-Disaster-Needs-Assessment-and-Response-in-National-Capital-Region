<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MASTER PAGE MENU</title>

        <link rel ="stylesheet" type="text/css" href ="../lib/css/style.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <script src="../lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="../lib/js/ckeditor.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
        <script src='../lib/js/j.js'></script>

    </head>
    <body>
        <?php
        include '../_COMMANDS/Admin_Commands.php';
        $AdminCommands = new Admin_Commands();
        $username = "";
        $password = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = htmlspecialchars($_REQUEST['AdminUsername']);
            $password = htmlspecialchars($_REQUEST['AdminPassword']);
        }

        if ($AdminCommands->checkAdminLogIn($username, $password) == TRUE) {
            ?>
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Welcome <?php echo $AdminCommands->GetAdminFirstName($username, $password) ?></a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <form action='admin_LOGIN.php' name='master LogInForm' method='post'>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="admin_LOGIN.php">Logout</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </nav>
            <section id="breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a >Dashboard</a></li>
                    </ol>
                </div>
            </section>

            <section id="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group">
                                <a class="list-group-item active main-color-bg">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                                </a> 
                                <form action="HistoryView.php" method="POST">
                                    <input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
                                    <input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
                                    <a class="list-group-item"><button type="submit" class="list-group-item" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> History View <span class="badge"></span></button></a>
                                </form>
                                <?php if ($AdminCommands->checkMasterLogIn($username, $password) == TRUE) { ?>

                                    <form action="registerAdmin.php" method="POST">
                                        <input type="hidden" name="MasterUsername" value="<?php echo $username; ?>"/>
                                        <input type="hidden" name="MasterPassword" value="<?php echo $password; ?>"/>
                                        <a class="list-group-item">
                                            <button type="submit" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Register Admin<span class="badge"></span></button>
                                        </a>
                                    </form>

                                <?php } ?>
                                <form action="DisasterReport.php" method="POST">
                                    <input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
                                    <input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
                                    <a class="list-group-item">
                                        <button type="submit" class="list-group-item" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Disaster Report<span class="badge"></span></button></a>
                                </form>

                                <form action="register.php" method="POST">
                                    <input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
                                    <input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
                                    <a class="list-group-item">
                                        <button type="submit" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register Family <span class="badge"></span></button></a>
                                </form>
                                <form action="../DataTable/index.php" method="POST">
                                    <input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
                                    <input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
                                    <a class="list-group-item"><button type="submit" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Summary Report <span class="badge"></span></button></a>
                                </form>
                                <form action="UpdateFamily/SearchFamilyHead.php" method="POST">
                                    <input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
                                    <input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
                                    <a class="list-group-item"><button type="submit" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Edit Family Registry <span class="badge"></span></button></a>
                                </form>
                                <form action="HEATMAP/index.php" method="POST">
                                    <input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
                                    <input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
                                    <a class="list-group-item"><button type="submit" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Heat Map <span class="badge"></span></button></a>
                                </form>
                                <form action="SearchPersonInfo.php" method="POST">
                                    <input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
                                    <input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
                                    <a class="list-group-item"><button type="submit" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Update Person Information <span class="badge"></span></button></a>

                                </form>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="panel panel-default">
                                <div class="panel-heading main-color-bg">
                                    <h3 class="panel-title" >Posts</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">

                                    </div>
                                    <br>
                                    <table class="table table-striped table-hover">
                                        <div class="slideshow-container">

                                            <div class="mySlides fade">
                                                <div class="numbertext">1 / 5</div>
                                                <img src="../resources/images/image/rsz_111.jpg" style="width:100%;height: 100%">
                                                <div class="text" style="font-size: 20px; font-weight: bolder">Typhoon Yolanda(Haiyan)- 2013</div>
                                            </div>
                                            <div class="mySlides fade">
                                                <div class="numbertext">2 / 5</div>
                                                <img src="../resources/images/image/rsz_4.jpg" style="width:100%;height: 100%">
                                                <div class="text" style="font-size: 20px; font-weight: bolder">Luzon Earthquake- 1990</div>
                                            </div>
                                            <div class="mySlides fade">
                                                <div class="numbertext">3 / 5</div>
                                                <img src="../resources/images/image/rsz_5.jpg" style="width:100%;height: 100%">
                                                <div class="text" style="font-size: 20px; font-weight: bolder">Mindanao Earthquake- 1976</div>
                                            </div>
                                            <div class="mySlides fade">
                                                <div class="numbertext">4 / 5</div>
                                                <img src="../resources/images/image/rsz_82.jpg" style="width:100%;height: 100%">
                                                <div class="text" style="font-size: 20px; font-weight: bolder">Typhoon Uring- 1991</div>
                                            </div>
                                            <div class="mySlides fade">
                                                <div class="numbertext">5 / 5</div>
                                                <img src="../resources/images/image/3.jpg" style="width:100%;height: 100%">
                                                <div class="text" style="font-size: 20px; font-weight: bolder">Taal Volcano Eruption- 2020</div>
                                            </div>
                                        </div>

                                        <br>

                                        <div style="text-align:center">
                                            <span class="dot"></span> 
                                            <span class="dot"></span> 
                                            <span class="dot"></span> 
                                            <span class="dot"></span> 
                                            <span class="dot"></span> 
                                        </div>
                                        <br>
                                        <p style="text-align: center; font-size: 30px; font-weight: bolder; background-color: #56baed; color: white">Worst Disasters in PH in Terms of Casualties</p>
                                        <tr>
                                            <th>Disaster Name</th>
                                            <th>Date</th>
                                            <th>Number of People Killed</th>

                                        </tr>
                                        <tr>
                                            <td>Typhoon Yolanda (Haiyan)</td>
                                            <td>8-Nov-2013</td>
                                            <td>6,300</td>

                                        </tr>
                                        <tr>
                                            <td>Mindanao earthquake</td>
                                            <td>17-Aug-1976</td>
                                            <td>6,000</td>

                                        </tr>
                                        <tr>
                                            <td>Typhoon Uring (Thelma)</td>
                                            <td>5-Nov-1991</td>
                                            <td>5,956</td>

                                        </tr>
                                        <tr>
                                            <td>1990 Luzon earthquake</td>
                                            <td>16-Jul-1990</td>
                                            <td>2,412</td>

                                        </tr>
                                        <tr>
                                            <td>Typhoon Pablo (Bopha)</td>
                                            <td>4-Dec-2012</td>
                                            <td>1,901</td>

                                        </tr>
                                        <tr>
                                            <td>Tropical Depression Winnie</td>
                                            <td>29-Nov-2004</td>
                                            <td>1,619</td>

                                        </tr>
                                        <tr>
                                            <td>Typhoon Titang (Kate)</td>
                                            <td>13-Oct-1970</td>
                                            <td>1,551</td>

                                        </tr>
                                        <tr>
                                            <td>Typhoon Sendong (Washi)</td>
                                            <td>15-Dec-2011</td>
                                            <td>1,439</td>

                                        </tr>
                                        <tr>
                                            <td>Typhoon Nitang (Ike)</td>
                                            <td>1-Sep-1984</td>
                                            <td>1,422</td>

                                        </tr>

                                        <tr>
                                            <td>Typhoon Reming (Durian)</td>
                                            <td>30-Nov-2006</td>
                                            <td>1,399</td>

                                        </tr>



                                    </table>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        1. Typhoon Yolanda (Haiyan)
                                    </p>
                                    <p style='font-size: 15px'>
                                        Typhoon Yolanda is one of the world's strongest and deadliest typhoons, prompting a rare public storm signal no. 4 in the Visayas. (READ: Storm signal no. 4 in PH history). Typhoon Yolanda caused massive devastation that killed 6,300 people.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        2. 1976 Mindanao earthquake
                                    </p>
                                    <p style='font-size: 15px'>
                                        With a magnitude of 7.9, it is also considered one of the strongest earthquakes to ever hit the country. According to the Philippine Institute of Volcanology and Seismology (PHIVOLCS), the tremor caused a tsunami in the coastline of the Moro Gulf in the North Celebes Sea.
                                        This “tsunamigenic earthquake” caused buildings to collapse, and killed around 6,000 people.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        3.Typhoon Uring (Thelma)
                                    </p>
                                    <p style='font-size: 15px'>
                                        Typhoon Uring is the second deadliest typhoon to hit the country. On November 5, 1991, it brought torrential rains over Leyte, causing several rivers to overflow and triggering massive flooding. It killed around 5,000 people, majority of whom were residents of Ormoc City.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        4. 1990 Luzon earthquake
                                    </p>
                                    <p style='font-size: 15px'>
                                        With a magnitude of 7.8, it is considered as one of the strongest and most devastating earthquakes to hit the country. The 1990 tremor caused several buildings and hotels to collapse in the cities of Baguio, Dagupan and Cabanatuan – burying people alive. The earthquake left 2,412 people dead.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        5. Typhoon Pablo (Bopha)
                                    </p>
                                    <p style='font-size: 15px'>
                                        Typhoon Pablo is one of the worst typhoons to hit Mindanao, causing massive flooding and killing 1,901 people.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        6. Tropical Depression Winnie
                                    </p>
                                    <p style='font-size: 15px'>
                                        In 2004, Tropical Depression Winnie struck Luzon and Visayas. Although it was not as strong as the other typhoons, it brought continuous torrential rain especially in Central Luzon, causing landslides and killing 1,619 people. The name “Winnie” was retired after this.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        7. Typhoon Titang (Kate)
                                    </p>
                                    <p style='font-size: 15px'>
                                        Also one of the strongest typhoons to hit Mindanao, Typhoon Titang's strong winds and heavy rains left 1,551 people dead.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        8. Typhoon Sendong (Washi)
                                    </p>
                                    <p style='font-size: 15px'>
                                        On December 15, 2011, Sendong hit the northern part of Mindanao and killed 1,439 people. Because of the massive number of fatalities and the damage it brought, it is also considered one of the deadliest typhoons in the Philippines.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        9. Typhoon Nitang (Ike)
                                    </p>
                                    <p style='font-size: 15px'>
                                        Typhoon Ike battered Central Visayas on September 1, 1984. It made several landfalls and brought strong winds and rains that caused the largest river in Negros Occidental to overflow. At least 1,422 people were killed.
                                    </p><br>

                                    <p style='font-weight: bolder;font-size: 18px'>
                                        10. Typhoon Reming (Durian)
                                    </p>
                                    <p style='font-size: 15px'>
                                        Months after Mt. Mayon’s eruption in 2006, Bicolanos faced another natural disaster when Typhoon Reming hit Albay in November 30. The flood caused by the typhoon was aggravated by the mud coming from the volcano, leaving 1,399 people dead.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <?php
        } else {
            echo ("<center>LOGIN CREDENTIALS FAILED, TRY AGAIN <br>");
            echo ("You will be redirected in 3 seconds</center>");
            ?>
            <script>
                setTimeout(function () {
                    window.location.href = "admin_LOGIN.php";
                }, 3000);
            </script><?php
        }
        ?>
        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 7500); // Change image every 7.5 seconds
            }
        </script>

    </body>
</html>
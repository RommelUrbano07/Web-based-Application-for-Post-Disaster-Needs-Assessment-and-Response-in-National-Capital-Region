<!DOCTYPE html>
<?php session_start(); ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$Username = htmlspecialchars($_POST["Username"]);
$Password = htmlspecialchars($_POST["Password"]);
$FirstName = htmlspecialchars($_POST["FirstName"]);
$MiddleName = htmlspecialchars($_POST["MiddleName"]);
$LastName = htmlspecialchars($_POST["LastName"]);
$Suffix = htmlspecialchars($_POST["Suffix"]);
$Gender = htmlspecialchars($_POST["Gender"]);

include '../_COMMANDS/Admin_Commands.php';
$AdminCommands = new Admin_Commands();
$MasterStatus = 0;
if ($AdminCommands->checkAdminAccountExists($FirstName, $MiddleName, $LastName) == FALSE) {
    if ($AdminCommands->checkAdminTableContent() == 0) {
        $MasterStatus = 1;
    }
    $process = $AdminCommands->registerAdmin($Username, $Password, $FirstName, $MiddleName, $LastName, $Suffix, $Gender, $MasterStatus);
    if ($process == TRUE) {
        $path = '';
        if ($AdminCommands->checkAdminTableContent() > 1) {
            $path = 'registeradmin.php';
        } else {
            $path = 'AdminLogin.php';
        }
        echo "<script type='text/javascript'>alert('REGISTRY SUCCESSFUL');</script>";
        ?>
        <script>
            time = 1;
            interval = setInterval(function () {
                time--;
                if (time == 0) {
                    // stop timer
                    clearInterval(interval);
                    // click
                    document.getElementById('thebutton').click();
                }
            }, 1000)
        </script>
        <form action="<?php echo $path; ?>" method="POST">
            <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND' onclick="document.getElementById()"></input> 
        </form>
        <?php
    } else {
        ?>
        <html>
            <head>
                <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                <link rel ="stylesheet" type="text/css" href ="../lib/css/style.css">
            </head>
            <body>
                <div class="container">
                    <div class="row">
                        <div class="alert-group">
                            <div class="alert alert-danger alert-dismissable">
                                <strong>Oh snap!</strong> ERROR IN SAVING, PLEASE CONTACT ADMINISTRATOR.
                                <script>
                time = 3;
                interval = setInterval(function () {
                    time--;
                    if (time == 0) {
                        // stop timer
                        clearInterval(interval);
                        // click
                        document.getElementById('thebutton').click();
                    }
                }, 1000)
                                </script>
                                <form action="registeradmin.php" method="POST">
                                    <input type='submit' id='thebutton' value='RETURN TO MENU IN 3 SECOND' onclick="document.getElementById()"></input> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>
        <?php
    }
} else {
    ?>
    <html>
        <head>
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <link rel ="stylesheet" type="text/css" href ="../lib/css/style.css">
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="alert-group">
                        <div class="alert alert-danger alert-dismissable">
                            <strong>Oh snap!</strong> YOU ALREADY SIGNED UP!
                            <script>
                                        time = 3;
                                        interval = setInterval(function () {
                                            time--;
                                            if (time == 0) {
                                                // stop timer
                                                clearInterval(interval);
                                                // click
                                                document.getElementById('thebutton').click();
                                            }
                                        }, 1000)
                            </script>
                            <form action="registeradmin.php" method="POST">
                                <input type="hidden" name="MasterUsername" value="<?php echo $username; ?>"/>
                                <input type="hidden" name="MasterPassword" value="<?php echo $password; ?>"/>
                                <input type='submit' id='thebutton' value='RETURN TO MENU IN 3 SECOND' onclick="document.getElementById()"></input> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html><?php
}
?>

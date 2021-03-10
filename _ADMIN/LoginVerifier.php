<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

include '../_COMMANDS/Admin_Commands.php';
$AdminCommands = new Admin_Commands();

$username = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars($_REQUEST['AdminUsername']);
    $password = htmlspecialchars($_REQUEST['AdminPassword']);
}

if ($AdminCommands->checkAdminLogIn($username, $password) == TRUE) {
    $_SESSION["AdminUsername"]=$username;
    $_SESSION["AdminPassword"]=$password;
    header('location:dashboard.php');
    exit();
} else {
    echo ('<script>alert("<html><body><center>LOGIN CREDENTIALS FAILED, TRY AGAIN <br>");</script>');
    echo ('<script>alert("You will be redirected in 3 seconds</center>");</script>');
    header("location: AdminLogin.php");
    exit();
    ?>
    <script>
        setTimeout(function () {
            window.location.href = "AdminLogin.php";
        }, 3000);
    </script><?php
    echo'</body></html>';
}


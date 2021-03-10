<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_SESSION["HeadFirstName"]= htmlspecialchars($_REQUEST['FirstName']);
$_SESSION["HeadMiddleName"]= htmlspecialchars($_REQUEST['MiddleName']);
$_SESSION["HeadLastName"]= htmlspecialchars($_REQUEST['LastName']);
$_SESSION["HeadSuffix"]= htmlspecialchars($_REQUEST['Suffix']);
header('location: EditFamily.php');
exit();
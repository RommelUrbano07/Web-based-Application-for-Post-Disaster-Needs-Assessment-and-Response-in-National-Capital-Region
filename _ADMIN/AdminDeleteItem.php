<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();
$ItemName= htmlspecialchars($_REQUEST['ItemName']);
$ItemQuantity= htmlspecialchars($_REQUEST['ItemQuantity']);

include '../_COMMANDS/Inventory.php';
$Inventory = new Inventory();

$DonationID=$Inventory->getDonationID($ItemName);
$cond=$Inventory->DeleteDonationEntry($DonationID);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
        </script><!--
        -->        <form action="donationinventory.php" method="POST">
            <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND' onclick="document.getElementById()">RETURN TO Relief Item Inventory </input>
        </form> 
    </body>
</html>

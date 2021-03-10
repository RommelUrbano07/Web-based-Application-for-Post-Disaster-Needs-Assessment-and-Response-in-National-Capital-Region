<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $CityName = htmlspecialchars($_REQUEST['CityName']);
        $Needs = htmlspecialchars($_REQUEST['NeedsType_Quantity']);
        $Needs = str_replace(' ', '', $Needs);
        $Remarks = htmlspecialchars($_REQUEST['remark']);

        include '../_COMMANDS/ReliefRequest.php';
        include '../_COMMANDS/DamageReport.php';
        include '../_COMMANDS/Inventory.php';
        $Relief = new ReliefRequest();
        $DamageReport = new DamageReport();
        $Inventory = new Inventory();
        include '../_COMMANDS/Notifications.php';
        $Notifications = new Notifications();

//        echo $CityName;
//        echo $Needs;
//        echo $Remarks.'<br>';

        $withdrawcond = FALSE;
        $ItemSplit = explode(".", $Needs);
        for ($i = 0; $i < count($ItemSplit); $i++) {
            if ($i + 1 != count($ItemSplit)) {
                $ItemSplitData = explode(":", $ItemSplit[$i]);
                $withdrawcond = $Inventory->checkInventoryQuantity($ItemSplitData[0], $ItemSplitData[1]);
                if($withdrawcond==FALSE){
                    break;
                }
            }
        }

        if ($withdrawcond == TRUE) {
            $adminID = $Notifications->getAdminID($_SESSION['AdminUsername']);
            $CityID = $Notifications->getCityID($CityName);
            $Notifications->GenerateReliefReport($adminID, $CityID, $Remarks);
            for ($i = 0; $i < count($ItemSplit); $i++) {
                if ($i + 1 != count($ItemSplit)) {
                    $ItemSplitData = explode(":", $ItemSplit[$i]);
                    $Inventory->withdrawItem($ItemSplitData[0], $ItemSplitData[1]);
                }
            }
            echo '<script> alert("Withdraw Success") </script>';
            

            $VictimID = $Relief->getVictimID($CityName);
            while ($rows = mysqli_fetch_assoc($VictimID)) {
                $DamageReport->registerHistoryLog($rows['VictimID']);
            }

            $result1 = $Notifications->getAllCustomerID();
            while ($rows1 = mysqli_fetch_assoc($result1)) {
                $customerID = $rows1['User_ID'];
                $logmsg = "Admin conducted a Relief Operation Drive in the city of: $CityName and used the ff items: $Needs";
                $Notifications->createNotifications($customerID, $logmsg);
            }
        } else {
            echo '<script> alert("Insufficient Inventory") </script>';
        }
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
        <form action="ActiveReportsDonations.php" method="POST">
            <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND' onclick="document.getElementById()">RETURN TO Donation Inventory </input>
        </form> 
    </body>
</html>

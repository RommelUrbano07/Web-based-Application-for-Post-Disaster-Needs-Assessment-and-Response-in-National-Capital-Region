<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();

        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        $DonationID = htmlspecialchars($_REQUEST['DonationID']);

        include '../_COMMANDS/Inventory.php';
        $Inventory = new Inventory();
        include '../_COMMANDS/Notifications.php';
        $Notifications = new Notifications();
        include '../_COMMANDS/Client_Commands.php';
        $ClientCommands = new Client_Commands();

        $cond = $Inventory->ApproveDonation($DonationID);
        $result=$Notifications->getDonorName($DonationID);
        while ($rows = mysqli_fetch_assoc($result)) {
            $FirstName = $rows['DonorFname'];
            $MiddleName = $rows['DonorMname'];
            $LastName = $rows['DonorLname'];
            $Suffix = $rows['DonorSuffix'];
            
            $personID = $ClientCommands->checkPersonID($FirstName, $MiddleName, $LastName, $Suffix);
            $customerID = $Notifications->getSpecificCustomerID($personID);
            if($customerID > -1){
                $logmsg="Admin Approved Donation Request for DonationID: $DonationID";
                $Notifications->createNotifications($customerID, $logmsg);
            }
        }
        
        if ($cond) {
            $logmsg = "Admin Approved Donation Request for DonationID: $DonationID ";
            $Inventory->createTransactionLog($_SESSION['AdminUsername'], $logmsg);
            
            $Inventory->AppendItemRequest($DonationID);
            echo ('<script>alert("Donation Successfully Approved!");</script>');
        } else {
            echo ('<script>alert("Error in Approving Donation Request Item");</script>');
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
        </script><!--
        -->        <form action="DonationApproval.php" method="POST">
            <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND' onclick="document.getElementById()">RETURN TO Donation </input>
        </form> 
    </body>
</html>
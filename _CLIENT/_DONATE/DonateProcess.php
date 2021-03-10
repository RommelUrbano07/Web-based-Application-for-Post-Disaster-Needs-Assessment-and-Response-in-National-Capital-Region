<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Determine how many forms are there in the register page.
$formPersonLen = (int) htmlspecialchars($_REQUEST["formPersonLength"]);
$formNeedsLen = (int) htmlspecialchars($_REQUEST["formNeedsLength"]);

// Place holder for the user inputs
// Disaster
$firstName = new ArrayObject();
$middleName = new ArrayObject();
$lastName = new ArrayObject();
$suffix = new ArrayObject();
$houseNo = "";
$streetName = "";
$subdivision = "";
$barangay = "";
$city = "";
$region = "";
$msg = "";
$disaster = "";
// Needs
$needs = new ArrayObject();
$amt = new ArrayObject();

include '../../_COMMANDS/Inventory.php';
$Inventory= new Inventory();
include '../../_COMMANDS/Client_Commands.php';
$ClientCommands= new Client_Commands();

$cond=False;

for ($i = 0; $i < $formPersonLen; $i++) {
    if ($i == 0) {
        $firstName->append(htmlspecialchars($_REQUEST["firstName" . $i]));
        $middleName->append(htmlspecialchars($_REQUEST["middleName" . $i]));
        $lastName->append(htmlspecialchars($_REQUEST["lastName" . $i]));
        $suffix->append(htmlspecialchars($_REQUEST["suffix" . $i]));
        $msg = htmlspecialchars($_REQUEST["itemDescription"]);
    } else {
        $firstName->append(htmlspecialchars($_REQUEST["firstName" . $i]));
        $middleName->append(htmlspecialchars($_REQUEST["middleName" . $i]));
        $lastName->append(htmlspecialchars($_REQUEST["lastName" . $i]));
        $suffix->append(htmlspecialchars($_REQUEST["suffix" . $i]));
    }
     if($ClientCommands->CheckPersonExist(
             htmlspecialchars($_REQUEST["firstName". $i]),  
             htmlspecialchars($_REQUEST["middleName". $i]), 
             htmlspecialchars($_REQUEST["lastName". $i]), 
             htmlspecialchars($_REQUEST["suffix". $i]))==FALSE){
        $cond=FALSE;
        break;
    }else{
        $cond=TRUE;
    }
}

if($cond==TRUE){
    for ($i = 0; $i < $formNeedsLen; $i++) {
        $needs->append(htmlspecialchars($_REQUEST["needs" . $i]));
        $amt->append((int) (htmlspecialchars($_REQUEST["needsAmt" . $i])));
    }

    echo("Item Description:<br>");
    echo($msg);

    $DonationID = $Inventory->AddDonationPendingID($msg);

    for ($i = 0; $i < $formPersonLen; $i++) {
        echo("'FN: " . $firstName->offsetGet($i) . "','MN: " . $middleName->offsetGet($i) . "','LN: " . $lastName->offsetGet($i) . "','SF: " . $suffix->offsetGet($i) ."<br>");
        $cond=$Inventory->AddDonor($firstName->offsetGet($i),  $middleName->offsetGet($i), $lastName->offsetGet($i), $suffix->offsetGet($i), $DonationID);  
    }
    
    for ($i = 0; $i < $formNeedsLen; $i++) {
        echo("'" . $needs->offsetGet($i) . "'," . $amt->offsetGet($i) . "<br>");
        $cond=$Inventory->AddDonationItem($needs->offsetGet($i), $amt->offsetGet($i), $DonationID);
    }
}else{
    echo('<script>alert("One/More Person/s Record are not enrolled in the system");</script>');
}

?>
<html>
    <body>
        <?php if ($cond==TRUE){
         echo '<script> alert("Donation Successful! Thank you for Donating! Rest Assured this will reach the Filipino People!"); </script>';
        }else{
        echo '<script> alert("There seems to be an error in the system, please contact the administrator."); </script>';
        }
        header("location: donate.php");
        exit();
        ?>
        <form action="donate.php" method="POST">
            <input type="submit" value="GO BACK TO DONATION PAGE" />
        </form>
    </body>
</html>
<html>
    <body>
<?php

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
include '../../_COMMANDS/Client_Commands.php';
$ClientCommands =  new Client_Commands();

$cond=False;

for ($i = 0; $i < $formPersonLen; $i++) {
    if ($i == 0) {
        $firstName->append(htmlspecialchars($_REQUEST["firstName" . $i]));
        $middleName->append(htmlspecialchars($_REQUEST["middleName" . $i]));
        $lastName->append(htmlspecialchars($_REQUEST["lastName" . $i]));
        $suffix->append(htmlspecialchars($_REQUEST["suffix" . $i]));
        $houseNo = htmlspecialchars($_REQUEST["houseNo"]);
        $streetName = htmlspecialchars($_REQUEST["streetName"]);
        $subdivision = htmlspecialchars($_REQUEST["subdivision"]);
        $barangay = htmlspecialchars($_REQUEST["barangay"]);
        $city = htmlspecialchars($_REQUEST["city"]);
        $region = htmlspecialchars($_REQUEST["region"]);
        $msg = htmlspecialchars($_REQUEST["message"]);
        $disaster = htmlspecialchars($_REQUEST["disaster"]);
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
$PersonID = new ArrayObject();
$NeedsID = new ArrayObject();
include '../../_COMMANDS/DamageReport.php';

$DamageReport = new DamageReport();
for ($i = 0; $i < $formPersonLen; $i++) {
    echo("'FN: " . $firstName->offsetGet($i) . "','MN: " . $middleName->offsetGet($i) . "','LN: " . $lastName->offsetGet($i) . "','SF: " . $suffix->offsetGet($i) . "','HN: " . $houseNo . "','SN: " . $streetName . "','BRG: " . $barangay . "','CT: " . $city . "','RGN: " . $region . "'<br>");
    $PersonID->append($DamageReport->PersonChecker($firstName->offsetGet($i), $lastName->offsetGet($i), $middleName->offsetGet($i), $suffix->offsetGet($i)));
}
$DisasterID = $DamageReport->registerDisaster($disaster, $region, $city, $barangay);

for ($i = 0; $i < $formNeedsLen; $i++) {
    echo("'" . $needs->offsetGet($i) . "'," . $amt->offsetGet($i) . "<br>");
    if ($DisasterID > 0) {
        $NeedsID->append($DamageReport->registerNeeds($needs->offsetGet($i), $amt->offsetGet($i), $msg));
    } else {
        echo('<script>alert("Error!");</script>');
    }
}

if ($DamageReport->createDisasterReport($NeedsID, $PersonID, $DisasterID . "", $subdivision, $houseNo, $streetName) == TRUE) {
    echo('<script>alert("REPORT SUCCESS");</script>');
} else {
    echo('<script>alert("REPORT ERROR CONTACT THE ADMINISTRATOR");</script>');
}
echo("Disaster: " . $disaster . "<br>");
echo("Message:<br>");
echo($msg);
}else{
    echo('<script>alert("One/More Person/s Record are not enrolled in the system");</script>');
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
        <form action="report.php" method="POST">
            <input type="submit" value="GO BACK TO REPORT PAGE" />
        </form>
    </body>
</html>
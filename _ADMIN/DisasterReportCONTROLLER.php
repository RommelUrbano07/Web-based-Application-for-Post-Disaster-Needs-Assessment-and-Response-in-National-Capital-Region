<?php
session_start();
$disasterType = htmlspecialchars($_REQUEST["disasterID"]);
$persons = explode(",", substr(htmlspecialchars($_REQUEST["persons"]), 0, strlen(htmlspecialchars($_REQUEST["persons"])) - 1));
$needs = explode(",", substr(htmlspecialchars($_REQUEST["needs"]), 0, strlen(htmlspecialchars($_REQUEST["needs"])) - 1));
$dateReported = htmlspecialchars($_REQUEST["dateReported"]);
$timeReported = htmlspecialchars($_REQUEST["timeReported"]);
$region = htmlspecialchars($_REQUEST["region"]);
$city = htmlspecialchars($_REQUEST["city"]);
$barangay = htmlspecialchars($_REQUEST["barangay"]);
$subdivision = htmlspecialchars($_REQUEST["subdivision"]);
$streetName = htmlspecialchars($_REQUEST["street"]);
$houseNo = htmlspecialchars($_REQUEST["houseNo"]);

echo (
"<html><body><table>"
 . "<tr>"
 . "<td>Disaster ID</td>"
 . "<td>Person/s Affected</td>"
 . "<td>Needs and Quantity</td>"
 . "<td>Date Reported</td>"
 . "<td>Time Reported</td>"
 . "<td>Region</td>"
 . "<td>City</td>"
 . "<td>Barangay</td>"
 . "<td>Subdivision</td>"
 . "<td>Street</td>"
 . "<td>House No.</td>"
 . "</tr>"
 . "<tr>"
 . "<td>" . $disasterType . "</td>"
 . "<td>" . substr(htmlspecialchars($_REQUEST["persons"]), 0, strlen(htmlspecialchars($_REQUEST["persons"])) - 1) . "</td>"
 . "<td>" . substr(htmlspecialchars($_REQUEST["needs"]), 0, strlen(htmlspecialchars($_REQUEST["needs"])) - 1) . "</td>"
 . "<td>" . $dateReported . "</td>"
 . "<td>" . $timeReported . "</td>"
 . "<td>" . $region . "</td>"
 . "<td>" . $city . "</td>"
 . "<td>" . $barangay . "</td>"
 . "<td>" . $subdivision . "</td>"
 . "<td>" . $streetName . "</td>"
 . "<td>" . $houseNo . "</td>"
 . "</tr>"
 . "</table>"
);


$personList=explode(',',substr(htmlspecialchars($_REQUEST["persons"]), 0, strlen(htmlspecialchars($_REQUEST["persons"])) - 1));

include '../_COMMANDS/DamageReport.php';
include '../_COMMANDS/Client_Commands.php';

$DamageReport = new DamageReport();
$ClientCommands = new Client_Commands();
$VictimID = new ArrayObject();

foreach ($personList as $value) {
    $creds = explode('/', $value);
    $reporterF = $creds[0];
    $reporterM = $creds[1];
    $reporterL = $creds[2];
    $reporterS = $creds[3];
   
    $reporterM=substr($reporterM,1, strlen($reporterM)-1);
    $reporterL=substr($reporterL,1, strlen($reporterL)-1);
    if($reporterS!=" " || $reporterS !=""){
        $reporterS=substr($reporterS,1, strlen($reporterS)-1);
    }
    echo 'FN: ' .strlen($reporterF) . ' MN:' . strlen($reporterM) . ' LN:' . strlen($reporterL) . ' SF:' . strlen($reporterS) . ' <br>';
    echo 'FN: ' .$reporterF . ' MN:' . $reporterM . ' LN:' . $reporterL . ' SF:' . $reporterS . ' <br>';
    $result = $DamageReport->returnVictimID($reporterF, $reporterM, $reporterL, $reporterS);
        while ($rows = mysqli_fetch_assoc($result)) {
            echo $rows["victim"].'<br>';
            $VictimID->append($rows["victim"]);
        }
    }



foreach ($VictimID as $value) {
    $DamageReport->registerHistoryLog($value);
}

echo ('<script>alert("Report Submitted");</script>');

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
<form action="disasterreport.php" method="POST">
    <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND' onclick="document.getElementById()">RETURN TO SEARCH FAMILY HEAD </input>
</form> 
</body>
</html>
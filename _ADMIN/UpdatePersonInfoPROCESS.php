<?php
session_start();

$FirstName = "";
$MiddleName = "";
$LastName = "";
$Suffix = "";
$BirthDate = "";
$ContactNo = "";
$HouseNo = "";
$StreetName = "";
$Barangay = "";
$City = "";
$Region = "";
$Subdivision = "";
$Gender = "";

$FirstName = htmlspecialchars($_REQUEST["firstName0"]);
$MiddleName = htmlspecialchars($_REQUEST["middleName0"]);
$LastName = htmlspecialchars($_REQUEST["lastName0"]);
$Suffix = htmlspecialchars($_REQUEST["suffix0"]);
$BirthDate = htmlspecialchars($_REQUEST["birthDate0"]);
$ContactNo = htmlspecialchars($_REQUEST["contactNo0"]);
$HouseNo = htmlspecialchars($_REQUEST["houseNo0"]);
$StreetName = htmlspecialchars($_REQUEST["streetName0"]);
$Barangay = htmlspecialchars($_REQUEST["barangay"]);
$City = htmlspecialchars($_REQUEST["city"]);
$Region = htmlspecialchars($_REQUEST["region"]);
$Subdivision = htmlspecialchars($_REQUEST["subdivision"]);
$Gender = htmlspecialchars($_REQUEST["gender"]);
$PersonID= htmlspecialchars($_REQUEST["PersonID"]);


$FirstNameOld = htmlspecialchars($_REQUEST["firstNameold"]);
$MiddleNameOld = htmlspecialchars($_REQUEST["middleNameold"]);
$LastNameOld = htmlspecialchars($_REQUEST["lastNameold"]);
$SuffixOld = htmlspecialchars($_REQUEST["suffixold"]);

echo $FirstName . '<br>';
echo $MiddleName . '<br>';
echo $LastName . '<br>';
echo $Suffix . '<br>';
echo $BirthDate . '<br>';
echo $ContactNo . '<br>';
echo $HouseNo . '<br>';
echo $StreetName . '<br>';
echo $Barangay . '<br>';
echo $City . '<br>';
echo $Region . '<br>';
echo $Subdivision . '<br>';
echo $Gender . '<br>';

include '../_COMMANDS/FamilyEdit.php';
$FamilyEdit = new FamilyEdit();
include '../_COMMANDS/Client_Commands.php';
$ClientCommands = new Client_Commands();
include '../_COMMANDS/Inventory.php';
$Inventory = new Inventory();
include '../_COMMANDS/Notifications.php';
$Notifications = new Notifications();

$barangayID = $ClientCommands->BarangayChecker($Region, $City, $Barangay);
$personID = $ClientCommands->checkPersonID($FirstNameOld, $MiddleNameOld, $LastNameOld, $SuffixOld);
$customerID = $Notifications->getSpecificCustomerID($personID);
if ($FamilyEdit->UpdateRecord($FirstName, $MiddleName, $LastName, $Suffix, $BirthDate, $ContactNo, $Gender, $StreetName, $HouseNo, $Subdivision, $barangayID, $PersonID) == TRUE) {
    echo '<script>alert("Update Successful");</script>';
    $logmsg="Admin Update Records for citizen: $FirstName $MiddleName $LastName $Suffix "
            . "with records $FirstName $MiddleName $LastName $Suffix $BirthDate $ContactNo $Gender"
            . "$StreetName $HouseNo $Subdivision";
    $Inventory->createTransactionLog($_SESSION['AdminUsername'], $logmsg);
    $Notifications->createNotifications($customerID, $logmsg);
    echo $customerID;
} else {
    echo '<script>alert("Update Error");</script>';
}

header("location: searchpersonalinfo.php");
exit();
?>

<html>
    <body>
        <form action = "SearchPersonInfo.php" method = "POST">
            <input type = 'hidden' name = 'AdminUsername' value = "<?php echo $username ?>"/>
            <input type = 'hidden' name = 'AdminPassword' value = "<?php echo $password ?>"/>
            <input type="submit" value="RETURN" />
        </form>
    </body>
</html>